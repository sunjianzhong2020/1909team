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
        $where=[
            ['status','=',1]
        ];
        $data = SkuName::where($where)->get();
        return view('admin/SkuName/SkuNameShow',['data'=>$data]);
    }

    /**
     * @param Request $request
     * @return array
     * 属性名删除
     */
    public function SkuNameDel(Request $request)
    {
        $arr = $request -> all();
//        dd($arr);
        $id = $arr['id'];
        $data = SkuName::where('sku_name_id',$id)->update(['status' => 2]);
        if($data){
            return $this->apiOutPut('200','删除成功',$data);
        }else{
            return $this->apiOutPut('000001','删除失败');
        }

    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 属性修改
     */
    public function SkuNameEdit($id)
    {
        $res = SkuName::where('sku_name_id',$id)->first();
//        dd($res);
        return view('admin/SkuName/SkuNameEdit',['res'=>$res]);
    }

    /**
     * @param Request $request
     * @return array
     * 属性执行修改
     */
    public function SkuNameUpd(Request $request)
    {
        $arr = $request -> all();
        $sku_name_name = $arr['sku_name_name'];
        $sku_name_id = $arr['sku_name_id'];
        if(empty($sku_name_name)){
            return $this->apiOutPut('000000','属性名称不能为空');
        }

        $data=[
            'sku_name_name'=>$sku_name_name,
            'addtime'=>time()
        ];
        $where=[
            ['sku_name_name','=',$sku_name_name]
        ];
        $count=SkuName::where($where)->count();
        if($count){
            return $this->apiOutPut('000000','该属性已存在',$count);
        }
        $res=SkuName::where('sku_name_id',$sku_name_id)->update($data);
        if($res){
            return $this->apiOutPut('200','修改成功',$res);
        }else{
            return $this->apiOutPut('000000','修改失败');
        }
    }

}
