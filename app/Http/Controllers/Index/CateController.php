<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
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
        //友情链接
        $active = DB::table('shop_active')->where('status',1)->limit(6)->get();
        //尾部导航栏
        $friend = DB::table('shop_friend')->where('status',1)->get();
        //导航栏
        $banner=DB::table('shop_banner')->get();
        $admin_id = request()->session()->get('uid');
//        dd($admin_id);
        $user_model=new User();
        $user_info=$user_model::where('uid',$admin_id)->first();
    	return view('index/cate/cateInfo',['brand'=>$brand,"shop_sku_val"=>$shop_sku_val,"shop_sku_name"=>$shop_sku_name,'goods'=>$goods,'active'=>$active,'friend'=>$friend,'banner'=>$banner,'user_info'=>$user_info]);
    }
}
