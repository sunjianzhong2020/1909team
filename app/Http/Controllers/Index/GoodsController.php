<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use Illuminate\Http\Request;
use App\Models\SkuVal;
use App\Models\Sku;
use App\Models\SkuName;
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
        //商品
        $goods_info=$goods_model
            ->where($where)
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
       //var_dump($n_data);
       // var_dump($n_data);
       //die;
        //猜你喜欢
        $like_where=[
            ['is_show','=',1],
            ['status','=',1],
            ['is_best','=',1]
        ];
        $like_data=$goods_model::where($like_where)->limit(6)->get();
//        print_r($goods_info);die;
//        进入店铺
       $dian=$goods_info->orderBy('goods_id','desc')->where('status',1)->limit(5)->get();

       //浏览历史记录

        return view('/index/goods/goodsInfo',['goods_info'=>$goods_info,'like_data'=>$like_data,'dian'=>$dian,'n_data'=>$n_data,'data'=>$data]);
    }
}
