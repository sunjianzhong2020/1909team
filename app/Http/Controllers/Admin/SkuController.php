<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SkuVal;
use App\Models\SkuName;
use App\Models\Goods;
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

    public function skuAdd_do()
    {

    }
}
