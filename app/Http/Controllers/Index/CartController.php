<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Sku;
use Illuminate\Http\Request;

class CartController extends CommonController
{
    //
    public function cartAdd(Request $request)
    {
          $goods_id=$request->post('goods_id');
          $buy_number=$request->post('buy_number');
          $goods_price=$request->post('goods_price');
         $goods_price=implode(',',$goods_price);
          //商品sku
         $sku=$request->post('attr_id');
         $sku=implode(',',$sku);
     //获取用户的id
        $uid=$request->session()->get('uid');

        //如果用户登录了 将购物车信息存入数据库
        if(!$uid){
            return $this->apiOutPut(443,'请登录',$uid);
        }else{
            return $this->cartSaveDb($goods_id,$buy_number,$goods_price,$sku,$uid);

        }



  }

    /**
     * 用户登陆了 将购物车信息存入 数据库
     */
    public function cartSaveDb($goods_id,$buy_number,$goods_price,$sku,$uid)
    {
        $where=[
            ['sku','=',$sku],
            ['goods_price','=',$goods_price],
            ['goods_id','=',$goods_id]
        ];
       $sku_model=new Sku();
        $sku_info=$sku_model::where($where)->first();
        if($sku_info['goods_num']<=0){
            return $this->apiOutPut(443,'该型号的商品已经卖空  看看别的吧 。',$sku_info);
        }
       if($buy_number>$sku_info['goods_num']){
           return $this->apiOutPut(443,'对不起，本店该型号的库存不足，给你带来不便，看看本店其他产品吧。',$sku_info);
       }
        $cart_model=new Cart();
          $cart_where=[

              ['uid','=',$uid],
              ['goods_id','=',$goods_id],
              ['is_del','=',1],
          ];
        $cart_info=$cart_model::where($cart_where)->first();
        if($cart_info){
            $buy_number=$cart_info['buy_number']+$buy_number;
            $goods_price=$buy_number*$goods_price;
            $data=[
                'goods_id'=>$goods_id,
                'buy_number'=>$buy_number,
                'total_price'=>$goods_price,
                'sku'=>$sku,
                'uid'=>$uid,
                'add_time'=>time(),
                'update_time'=>time()
            ];
            $u_where=[
                ['uid','=',$uid],
                ['goods_id','=',$goods_id],
            ];
            $res=$cart_model::where($u_where)->update($data);
            if($res){
                return $this->apiOutPut(200,'加入成功，在购物车等亲哦',$res);
            }else{
                return $this->apiOutPut(443,'对不起，购物车加入失败',$res);
            }
        }else{
            $data=[
                'goods_id'=>$goods_id,
                'buy_number'=>$buy_number,
                'total_price'=>$goods_price,
                'sku'=>$sku,
                'uid'=>$uid,
                'add_time'=>time()
            ];
            $res=$cart_model::insert($data);
            if($res){
                return $this->apiOutPut(200,'加入成功，在购物车等亲哦',$res);
            }else{
                return $this->apiOutPut(443,'对不起，购物车加入失败',$res);
            }
        }


    }
}
