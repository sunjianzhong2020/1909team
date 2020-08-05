<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Order;
use App\Models\Pay;
use App\Models\Address;
use App\Models\Cart;
class PayController extends CommonController
{
    /**
     * @return mixed
     * 购物车跳订单
     */
    public function payAdd(Request $request)
    {
        //接收前台传过来的id
        $data = $request->goods_id;
        #赋值
        $goodss_id=$data;
        #抓化成数组
        $data=explode(",",$data);
        #获取地址
        $address = Address::get();
        #给个空 遍历地址 进行拼接
        $arr=[];
        foreach($address as $k=>$v) {
            $aa = Area::where('id', $v['shop_address_province'])->pluck('name');
            $v['shop_address_province'] = $aa[0];
            $bb = Area::where('id', $v['shop_address_city'])->pluck('name');
            $v['shop_address_city'] = $bb[0];
            $cc = Area::where('id', $v['shop_address_area'])->pluck('name');
            $v['shop_address_area'] = $cc[0];
            $arr[]=$v;
        }
        #两表联查  商品和购物车表
        $goods_info = Cart::leftjoin('shop_goods','shop_goods.goods_id','=','shop_cart.goods_id')
                            ->whereIn('shop_cart.goods_id',$data)
                            ->get();
        #求总价格
        $money=0;
        foreach($goods_info as $k=>$v){
            $money+=$v['buy_number']*$v['price'];
        }
//        dd($money);die;
        return view('index/pay/payAdd',['arr'=>$arr,"goodss_id"=>$goodss_id,"money"=>$money,'goods_info'=>$goods_info]);
    }


    /**
     * @param Request $request
     * 执行订单添加
     */
    public function payAdd_do(Request $request)
    {
        #从session获取用户id
        $uid=session('uid');
        #接收商品id
        $data = $request->goods_id;
        #转化成数组
        $data=explode(",",$data);
        #生成订单号
        $pay_num=time().rand(000,999);
        #查询购物车表
        $goods_info=Cart::whereIn("goods_id",$data)->get();
        #获取总价格
        $money=0;
        foreach($goods_info as $k=>$v){
            $money+=$v['buy_number']*$v['price'];
        }
//        dd($money);
        #实例化模型入库
        $pay_model=new Pay;
        $pay_model->user_id=$uid;
        $pay_model->pay_num=$pay_num;
        $pay_model->price=$money;
        $pay_model->addtime=time();
        $result=  $pay_model->save();
//    dd($result);
        #给个空数组 遍历数组 拼接入库
        $order=[];
        foreach($data as $k=>$v){
            $goods_info=Cart::where("goods_id",$v)->first();
            $order['goods_id']=$goods_info['goods_id'];
            $order['uid']=$uid;
            $order['buy_number']=$goods_info['buy_number'];
            $order['price']=$goods_info['price'];
            $order_info=Order::insert($order);
        }
        #查询订单表
        $p_id =  Pay::where("pay_num",$pay_num)->first();
        #赋值给p_id
        $p_id = $p_id['p_id'];
        #遍历goods_id
        foreach($data as $k=>$v){
//            dd($v);
        #循环修改订单商品表的p_id
        $obj = Order::where("goods_id",$v)->update(["p_id"=>$p_id]);
        }
//        dd($odk);
        if($obj){
            return $this->apiOutPut('200','下单成功',$obj);
        }else{
            return $this->apiOutPut('000001','下单失败');
        }
    }
}
