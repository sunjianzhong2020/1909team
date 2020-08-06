<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Goods;
use Illuminate\Http\Request;
use App\Models\SkuVal;
use App\Models\Sku;
use App\Models\SkuName;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class GoodsController extends CommonController
{
    /***
     * 商品详情页
     */
    public function goodsInfo($goods_id){
        $where=[
            ['shop_goods.goods_id','=',$goods_id]
        ];
        $goods_model=new Goods();
        //商品详情
        $goods_info=$goods_model
            ->where('goods_id',$goods_id)
            ->first();
        //属性sku
        $goodsInfo=$goods_model
            ->leftjoin('shop_sku','shop_sku.goods_id','=','shop_goods.goods_id')
            ->leftjoin('shop_sku_val','shop_sku_val.sku_val_id','=','shop_sku.sku')
            ->leftjoin('shop_sku_name','shop_sku_name.sku_name_id','=','shop_sku_val.sku_name_id')
            ->where($where)
            ->get();
        //循环得出sku属性属性值表中的sku的值
        foreach($goodsInfo as $k=>$v){
            static $sku=[];
            $sku[]=$v['sku'];

        }
        $sku=array_unique($sku);
        $sku=implode(',',$sku);

        $sku=explode(',',$sku);
        $sku_val_model=new SkuVal();

        foreach($sku as $k=>$v){
            static $data=[];
            $val_where=[
                ['sku_val_id','=',$v],

            ];
            $sku_val = SkuVal::where($val_where)->first();
            if(!$sku_val){
                echo "<script>alert('数据走丢了');location.href='/index/index';</script>";
            }
            $data[]=$sku_val;
            // var_dump($data);die;
        }
        // $data=array_unique($data);
        $sku_name_model=new SkuName();
        $n_data=[];
        foreach($data as $k=>$v){
            // dd($v);
            $sku_where=[
                ['sku_name_id','=',$v['sku_name_id']]
            ];
            $name_data=$sku_name_model::where($sku_where)->first();
            $n_data[]=$name_data;
        }
        $n_data = array_unique($n_data);
        $like_where=[
            ['is_show','=',1]
        ];
        $like_data=$goods_model->orderBy('goods_id','desc')->limit(6)->where($like_where)->get();
        $f_data=$goods_model->limit(5)->where($like_where)->get();

        //友情链接
        $active = DB::table('shop_active')->where('status',1)->limit(6)->get();
        //尾部导航栏
        $friend = DB::table('shop_friend')->where('status',1)->get();
        //导航栏
        $banner=DB::table('shop_banner')->get();
        //品牌推荐
        $brand_where=[
            ['status','=',1]
        ];
        $brand_model=new Brand();
        $brand_data=$brand_model::where($brand_where)->get();
        $admin_id = request()->session()->get('uid');
//        dd($admin_id);
        $user_model=new User();
        $user_info=$user_model::where('uid',$admin_id)->first();
            return view('/index/goods/goodsInfo',['like_data'=>$like_data,'f_data'=>$f_data,'goods_info'=>$goods_info,'n_data'=>$n_data,'data'=>$data
            ,'brand_data'=>$brand_data,'active'=>$active,'friend'=>$friend,'banner'=>$banner,'user_info'=>$user_info]);
    }
    /**
     * 商品的sku
     */
    public function goodsSku(Request $request){
        $sku_val_id=$request->all();
        $attr_id=$sku_val_id['attr_id'];
        $attr_id=implode(',',$attr_id);
//        echo $attr_id;die;
       $shop_sku=new Sku();
        $where=[
            ['shop_sku.sku','=',$attr_id]
        ];
        $info=$shop_sku
            ->leftjoin('shop_sku_val','shop_sku_val.sku_val_id','=','shop_sku.sku')
            ->where($where)
            ->first();
//        dd($info);die;
        if($info){
            return $this->apiOutPut(200,'success',$info);
        }else{
            return $this->apiOutPut(443,'fail',$info);
        }

    }

}
