<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SkuName;
class SkuNameController extends CommonController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 属性添加
     */
    public function SkuNameAdd()
    {
        return view('admin/SkuName/SkuNameAdd');
    }

    /**
     * @param Request $request
     * @return array
     * 属性执行添加
     */
    public function SkuNameAdd_do(Request $request)
    {
        $arr = $request -> all();
//        print_r($arr);die;
        $sku_name_name = $arr['sku_name_name'];
        if(empty($sku_name_name)){
            return $this -> apiOutPut('000001','属性名称不能为空');
            exit;
        }
        $data['sku_name_name'] = $sku_name_name;
        $data['addtime'] = time();
        $obj = SkuName::where(['sku_name_name' => $sku_name_name])->first();
        if($obj){
            return $this -> apiOutPut('000001','属性名称已存在');
            exit;
        }
        $sku_info = SkuName::insert($data);
        if($sku_info){
            return $this -> apiOutPut('200','属性添加成功',$sku_info);
        }else{
            return $this -> apiOutPut('000001','属性添加失败');
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 属性展示
     */
    public function SkuNameShow(Request $request)
    {
        $data = SkuName::get();
        return view('admin/SkuName/SkuNameShow',['data'=>$data]);
    }
}
