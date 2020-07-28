<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Goods;
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

        //广告

        $ment = DB::table('shop_ment')->limit(6)->get();
        //分类展示
        $cate=DB::table('shop_cate')->get()->toArray();
        //导航栏
        $banner=DB::table('shop_banner')->get();



        //今日推荐
        $day_where=[
            ['is_show','=',1],
            ['is_new','=',1],
            ['status','=',1]
        ];
        $goods_model=new Goods();
        $day_data=$goods_model::where($day_where)->orderBy('goods_id')->limit(4)->get();
        //猜你喜欢
        $like_where=[
            ['is_show','=',1],
            ['is_best','=',1],
            ['status','=',1]
        ];
        $where=[
            ['is_show','=',1],
            ['status','=',1]
        ];
        $like_data=$goods_model::where($like_where)->whereIn('goods_id',[5,6,7,8,9,10])->get();
//        print_r($like_data);
        //有趣区
        $g_data=$goods_model::where('goods_id',11)->get();
        //好东西
        $good_data=$goods_model::where($where)->whereIn('goods_id',[12,14])->get();
//        print_r($good_data);die;
        //品牌街
        $street_data=$goods_model::where($where)->where('goods_id',13)->get();
        $street_two_data=$goods_model::where($where)->whereIn('goods_id',[15,16])->get();
//        print_r($street_two_data);die;
        //家用电器
        $watch=$goods_model::where($where)->whereIn('goods_id',[17])->get();
//        print_r($watch);die;
        $k_data=$goods_model::where($where)->whereIn('goods_id',[21,22])->get();
        $big_data=$goods_model::where($where)->whereIn('goods_id',[23])->get();
        $s_data=$goods_model::where($where)->whereIn('goods_id',[24,25])->get();
        //轮播图
        $three_data=$goods_model::where($where)->whereIn('goods_id',[18,19,20])->get();
        $res = DB::table('shop_ment')->limit(6)->get();
//        print_r($res);die;


//        $res = DB::table('shop_ment')->where('shop_ment_img')-
//        $res = DB::table('shop_ment')->limit(6)->get();
//       return view('index/index',['data'=>$res]);

        $res = DB::table('shop_ment')->get();

       return view('index/index',['data'=>$res,'day_data'=>$day_data,'like_data'=>$like_data,'g_data'=>$g_data,'good_data'=>$good_data
       ,'three_data'=>$three_data,'street_data'=>$street_data,'street_two_data'=>$street_two_data,'watch'=>$watch,'k_data'=>$k_data,'big_data'=>$big_data
       ,'s_data'=>$s_data,'ment'=>$ment,'cate'=>$cate,'banner'=>$banner]);

    }
    public function item(Request $request)
    {
        return view('index/item');
    }
}
