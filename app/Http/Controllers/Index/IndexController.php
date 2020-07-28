<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 前台模板
     */
    public function index(Request $request)
    {
        //$res = DB::table('shop_ment')->where('shop_ment_img')-
        $res = DB::table('shop_ment')->get();
        //分类展示
        $cate=DB::table('shop_cate')->get()->toArray();
        //导航栏
        $banner=DB::table('shop_banner')->get();
        return view('index/index',['data'=>$res,'cate'=>$cate,'banner'=>$banner]);
    }
}
