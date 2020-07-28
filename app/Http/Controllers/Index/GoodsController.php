<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    /**
     * 商品的详情页
     */
    public function goodsInfo($id)
    {
        $goods_model=new Goods();
        $where=[
            ['shop_goods.goods_id','=',$id]
        ];
//        echo $id;die;
        $goods_info=$goods_model
            ->leftjoin('shop_sku','shop_sku.goods_id','=','shop_goods.goods_id')
            ->leftjoin('shop_sku_val','shop_sku_val.sku_val_id','=','shop_sku.sku')
            ->leftjoin('shop_sku_name','shop_sku_name.sku_name_id','=','shop_sku_val.sku_name_id')
            ->where($where)
            ->first();
//        print_r($goods_info);die;
        //猜你喜欢
        $like_where=[
            ['is_show','=',1],
            ['status','=',1],
            ['is_best','=',1]
        ];
        $like_data=$goods_model::where($like_where)->limit(6)->get();
//        print_r($goods_info);die;
        return view('/index/goods/goodsInfo',['goods_info'=>$goods_info,'like_data'=>$like_data]);
    }
}
