<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Sku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class CateController extends CommonController
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 分类详情页面
     */
    public function cateInfo($id)
    {
        //商品品牌
        $brand = DB::table('shop_brand')->get();
        //商品
        $goods = DB::table('shop_goods')->paginate(5);
        //商品属性值
        $shop_sku_val = DB::table("shop_sku_val")->get();
        //商品属性
        $shop_sku_name = DB::table("shop_sku_name")->whereIn('sku_name_id', [3, 5, 6, 9])->get();
        //友情链接
        $active = DB::table('shop_active')->where('status', 1)->limit(6)->get();
        //尾部导航栏
        $friend = DB::table('shop_friend')->where('status',1)->limit(5)->get();
        //导航栏
        $banner=DB::table('shop_banner')->limit(8)->get();

        $admin_id = request()->session()->get('uid');
//        dd($admin_id);
        $user_model = new User();
        $user_info = $user_model::where('uid', $admin_id)->first();
        return view('index/cate/cateInfo', ['brand' => $brand, "shop_sku_val" => $shop_sku_val, "shop_sku_name" => $shop_sku_name, 'goods' => $goods, 'active' => $active, 'friend' => $friend, 'banner' => $banner, 'user_info' => $user_info]);
    }

    /**
     * 商品列表的sku
     */
    public function skuList(Request $request)
    {
        //接收sku的属性值的id
        $sku_val_id = $request->post('sku_val_id');
        $sku_model = new Sku();
        $sku_data = $sku_model::where('sku', $sku_val_id)->get();
        $goods_id = [];
        foreach ($sku_data as $k => $v) {
            $goods_id[] = $v->goods_id;
        }
        $goods_model = new Goods();
        $g_where = [
            ['is_show', '=', 1]
        ];
        $goods_info = $goods_model::where($g_where)->whereIn('goods_id', $goods_id)->get();
//        var_dump($goods_info);
        return view('index/cate/newinfo', ['goods' => $goods_info]);
    }

    /**
     * 新品热卖
     */
    public function cateIs(Request $request)
    {
       $field=$request->post('field');
       $goods_model=new Goods();
        $goods_info=$goods_model::where($field,1)
            ->orderBy('goods_id','desc')->limit(4)->get();
        return view('index/cate/newinfo', ['goods' => $goods_info]);
    }
}
