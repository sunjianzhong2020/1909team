<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SkuVal;
class SkuValController extends CommonController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 商品属性值添加
     */
    public function SkuValAdd()
    {
        return view('admin/SkuVal/SkuValAdd');
    }

    public function SkuValAdd_do(Request $request)
    {
        $arr = $request -> all();
//        print_r($arr);die;
        $sku_val_name = $arr['sku_val_name'];
        if(empty($sku_val_name)){
            return $this -> apiOutPut('000001','属性名称不能为空');
            exit;
        }
        $data['sku_val_name'] = $sku_val_name;
        $data['addtime'] = time();
        $obj = SkuVal::where(['sku_val_name' => $sku_val_name])->first();
        if($obj){
            return $this -> apiOutPut('000001','属性名称已存在');
            exit;
        }
        $sku_info = SkuVal::insert($data);
        if($sku_info){
            return $this -> apiOutPut('200','属性添加成功',$sku_info);
        }else{
            return $this -> apiOutPut('000001','属性添加失败');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 属性值展示
     */
    public function SkuValShow(Request $request)
    {
        $where = [
            ['status','=',1]
        ];
        $data = SkuVal::where($where)->get();
        return view('admin/SkuVal/SkuValShow',['data' => $data]);
    }


    public function SkuValDel(Request $request)
    {
        $arr = $request -> all();
//        dd($arr);
        $id = $arr['id'];
        $data = SkuVal::where('sku_val_id',$id)->update(['status' => 2]);
        if($data){
            return $this->apiOutPut('200','删除成功',$data);
        }else{
            return $this->apiOutPut('000001','删除失败');
        }

    }
}
