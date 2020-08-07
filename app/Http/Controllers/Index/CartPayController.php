<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Goods;
use App\Models\SkuName;
use App\Models\SkuVal;
use Illuminate\Http\Request;
use App\Models\Sku;
use Illuminate\Support\Facades\DB;
class CartPayController extends CommonController
{
    /**
     * @return mixed
     * 购物车列表页面
     */
    public function cart_pay_add(Request $request)
    {
        //尾部导航栏
        $friend = DB::table('shop_friend')->where('status',1)->limit(5)->get();
        $uid=$request->session()->get('uid');
         $cart_where=[
            ['uid','=',$uid],
             ['is_del','=',1],
             ['is_show','=',1]
         ];
        $cart_model=new Cart();
        $goods_info=$cart_model
            ->leftjoin('shop_goods','shop_goods.goods_id','=','shop_cart.goods_id')

            ->where($cart_where)
            ->get();
//        dd($goods_info);
        $sku=[];

        foreach($goods_info as $k=>$v){
           $sku[]=$v['sku'];

        }
        $sku_val_name=[];
        foreach($sku as $k=>$v){
                $sku_val_name[]=$v;
        }
        $sku_val_name=implode(',',$sku_val_name);
        $sku_val_name=explode(',',$sku_val_name);
//        echo $sku_val_name;die;
       $sku_val_model=new SkuVal();
        $sku_val_name=$sku_val_model::whereIn('sku_val_id',$sku_val_name)->get();
//        dd($sku_val_name);
        $sku_name_id=[];
        foreach($sku_val_name as $k=>$v){
           $sku_name_id[]=$v['sku_name_id'];
        }
       $sku_name_id=array_unique($sku_name_id);
        $sku_name_model=new SkuName();
        $sku_name=$sku_name_model::whereIn('sku_name_id',$sku_name_id)->get();
        return view('index/cart_pay/cart_pay_add',['goods_info'=>$goods_info,'sku_val_name'=>$sku_val_name,'sku_name'=>$sku_name,'friend'=>$friend]);
    }
}
