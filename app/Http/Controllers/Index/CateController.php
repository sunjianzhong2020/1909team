<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CateController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 分类详情页面
     */
    public function cateInfo($id)
    {
    	//商品品牌
    	$brand=DB::table('shop_brand')->get();
    	//商品
    	$goods=DB::table('shop_goods')->paginate(5);
        //商品属性值
        $shop_sku_val=DB::table("shop_sku_val")->get();
        //商品属性
        $shop_sku_name=DB::table("shop_sku_name")->get();

    	//sku属性值
    	return view('index/cate/cateInfo',['brand'=>$brand,"shop_sku_val"=>$shop_sku_val,"shop_sku_name"=>$shop_sku_name,'goods'=>$goods]);
    }
}
