<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\PrivModel;
use Illuminate\Http\Request;

class PrivController extends CommonController
{
    /**
     * 权限添加
     */
    public function privCreate()
    {
        return view('admin/priv/privCreate');
    }

    /**
     * 添加执行
     */
    public function privStore(Request $request)
    {
        $priv_name=$request->post('priv_name');
        $priv_url=$request->post('priv_url');
        if(empty($priv_name)){
             return $this->apiOutPut('000000','权限名称不能为空',$priv_name);
        }
         if(empty($priv_url)){
             return $this->apiOutPut('000000','权限路由不能为空',$priv_url);
        }
        $priv_where=[
            ['priv_name','=',$priv_name]

        ];

         $data=[
             'priv_name'=>$priv_name,
             'priv_url'=>$priv_url,
             'add_time'=>time()
         ];

        $priv_model=new PrivModel();
        $count=$priv_model::where($priv_where)->count();
        if($count>0){
            return $this->apiOutPut('000000','该权限已存在',$count);
        }
        $res=$priv_model::insert($data);
        if($res){
            return $this->apiOutPut('200','添加成功',$res);

        }else{
            return $this->apiOutPut('000000','添加失败',$res);

        }
    }
    /**
     * 权限展示
     */
    public function privIndex()
    {
        $pageSize=config('app.pageSize');
        $priv_model=new PrivModel();
        $priv_data=$priv_model::where('is_del',1)->paginate($pageSize);
        return view('admin/priv/privIndex',['priv_data'=>$priv_data]);
    }
    /**
     * 权限删除
     */
    public function privDel(Request $request)
    {
        $priv_id=$request->post('priv_id');
      $priv_model=new PrivModel();
        $res=$priv_model::where('priv_id',$priv_id)->update(['is_del'=>2]);
        if($res){
            return $this->apiOutPut('200','删除成功',$res);
        }else{
            return $this->apiOutPut('000000','删除失败',$res);

        }
    }
    /**
     * 权限修改
     */
    public function privEdit($priv_id){
        $priv_model=new PrivModel();
        $priv_data=$priv_model::where('priv_id',$priv_id)->first();
        return view('admin/priv/privEdit',['priv_data'=>$priv_data]);
    }
    /**
     * 权限修改执行
     */
    public function privEditDo(Request $request)
    {
        $priv_id=$request->post('priv_id');
        $priv_name=$request->post('priv_name');
        $priv_url=$request->post('priv_url');
         if(empty($priv_name)){
             return $this->apiOutPut('000000','权限名称不能为空',$priv_name);
        }
         if(empty($priv_url)){
             return $this->apiOutPut('000000','权限路由不能为空',$priv_url);
        }
        $data=[
            'priv_name'=>$priv_name,
            'priv_url'=>$priv_url,
            'add_time'=>time()
        ];
        $where=[
            ['priv_id','!=',$priv_id],
            ['priv_name','=',$priv_name]
        ];
        $priv_model=new PrivModel();
        $count=$priv_model::where($where)->count();
        if($count){
            return $this->apiOutPut('000000','该权限已存在',$count);
        }
        $res=$priv_model::where('priv_id',$priv_id)->update($data);
        if($res){
            return $this->apiOutPut('200','修改成功',$res);
        }else{
            return $this->apiOutPut('000000','修改失败',$res);

        }
    }
}
