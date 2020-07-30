<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CateController extends Controller
{
    /**
    *分类详情
    */
    public function cateInfo($id)
    {
    	//商品品牌
    	$brand=DB::table('shop_brand')->get();
    	//商品
    	$goods=DB::table('shop_goods')->paginate(5);
    	return view('index/cate/cateInfo',['brand'=>$brand,'goods'=>$goods]);
    }
}
