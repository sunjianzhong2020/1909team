<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SkuVal;
use Illuminate\Support\Facades\DB;

class SkuValController extends CommonController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 商品属性值添加
     */
    public function SkuValAdd()
    {
        $sku_name = DB::table('shop_sku_name')->where('status',1)->get();
        return view('admin/SkuVal/SkuValAdd',['sku_name'=>$sku_name]);
    }

    /**
     * @param Request $request
     * @return array
     * 商品属性值执行添加
     */
    public function SkuValAdd_do(Request $request)
    {
        $arr = $request -> all();
//        print_r($arr);die;
        $sku_name_id = $arr['sku_name_id'];
        $sku_val_name = $arr['sku_val_name'];
        if(empty($sku_val_name)){
            return $this -> apiOutPut('000001','属性名称不能为空');
            exit;
        }
        $data['sku_val_name'] = $sku_val_name;
        $data['sku_name_id'] = $sku_name_id;
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
            ['shop_sku_name.status','=',1],
            ['shop_sku_val.status','=',1]
        ];
        $data = SkuVal::leftjoin('shop_sku_name','shop_sku_name.sku_name_id','=','shop_sku_val.sku_name_id')->where($where)->paginate(2);
        return view('admin/SkuVal/SkuValShow',['data' => $data]);
    }

    /**
     * @param Request $request
     * @return array
     * 商品属性值删除
     */
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
