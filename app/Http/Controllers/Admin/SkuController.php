<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SkuVal;
use App\Models\SkuName;
use App\Models\Goods;
use App\Models\Sku;
class SkuController extends CommonController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * sku添加
     */
    public function skuAdd()
    {
        $goods = Goods::where('status',1)->get();
        $sku_name = SkuName::where('status',1)->get();
        foreach($sku_name as $k=>$v){
            $sku_val = SkuVal::where('sku_name_id',$v['sku_name_id'])->get();
            $v['a'] = $sku_val;
        }
        return view('/admin/sku/skuAdd',['goods'=>$goods,'sku_name'=>$sku_name]);
    }

    public function skuAdd_do(Request $request)
    {
       $arr = $request -> all();
//       dd($arr);
       $sku='';
        foreach ($arr['arr'] as $k=>$v) {
            $sku.=$v.',';
       }
        $sku=trim($sku,',');
        $goods_id = $arr['goods_id'];
        $goods_price = $arr['goods_price'];
        if(empty($goods_price)){
            return $this->apiOutPut('000001','商品价格不能为空');
            exit;
        }
        $goods_num = $arr['goods_num'];
        if(empty($goods_num)){
            return $this->apiOutPut('000001','商品库存不能为空');
            exit;
        }
        $data['sku'] = $sku;
        $data['goods_id'] = $goods_id;
        $data['goods_price'] = $goods_price;
        $data['goods_num'] = $goods_num;
        $data['addtime'] = time();
        $sku_info = Sku::insert($data);
        if($sku_info){
            return $this -> apiOutPut('200','sku添加成功',$sku_info);
        }else{
            return $this -> apiOutPut('000001','sku添加失败');
        }

    }
}
