<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\PrivModel;
use App\Models\RoleModel;
use App\Models\RolePrivModel;
use Illuminate\Http\Request;

class RoleController extends CommonController
{
    /**
     * 角色添加
     */
    public function roleCreate()
    {
       return view('admin/role/roleCreate');
    }
   /**
    * 角色天添加执行
    */
   public function roleStore(Request $request)
   {
      $role_name=$request->post('role_name');
      if(empty($role_name)){
          return $this->apiOutPut(000000,'角色名称不能为空',$role_name);
      }
       $role_model=new RoleModel();
       $data=[
           'role_name'=>$role_name
       ];
       $where=[
           ['role_name','=',$role_name]
       ];
       $count=$role_model::where($where)->count();
       if($count>0){
           return $this->apiOutPut(000000,'该角色名称已经存在',$count);
       }
       $res=$role_model::insert($data);
       if($res){
           return $this->apiOutPut(200,'角色添加成功',$res);
       }else{
           return $this->apiOutPut(000000,'角色添加失败',$res);
       }
}
    /**
     * 角色展示
     */
    public function roleIndex(Request $request)
    {
        //根据角色名称的搜搜
        $role_name=$request->post('role_name');
       $where=[
           ['is_del','=',1],
           ['role_name','like','%'.$role_name.'%']
       ];
        $pageSize=config('app.pageSize');
        $role_model=new RoleModel();
        $role_data=$role_model::where($where)->paginate($pageSize);
        return view('admin/role/roleIndex',['role_data'=>$role_data,'role_name'=>$role_name]);
    }
    /**
     * 角色删除
     */
    public function roleDel(Request $request){
       $role_id=$request->post('role_id');
        $role_model=new RoleModel();
        $res=$role_model::where('role_id',$role_id)->update(['is_del'=>2]);
        if($res){
            return $this->apiOutPut(200,'删除成功',$res);
        }else{
            return $this->apiOutPut(000000,'删除失败',$res);
        }
    }
    /**
     * 角色修改
     */
    public function roleEdit($role_id)
    {
        $role_model=new RoleModel();
        $role_data=$role_model::where('role_id',$role_id)->first();
        return view('admin/role/roleEdit',['role_data'=>$role_data]);
    }
    /**
     * 修改执行
     */
    public function roleEditDo(Request $request)
    {
       $role_name=$request->post('role_name');
         if(empty($role_name)){
         return $this->apiOutPut(000000,'角色名称不能为空',$role_name);
      }
       $role_id=$request->post('role_id');
        $where=[
            ['role_name','=',$role_name],
            ['role_id','!=',$role_id]
        ];
        $role_model=new RoleModel();
        $count=$role_model::where($where)->count();
        if($count>0){
            return $this->apiOutPut(000000,'该角色名称已存在',$count);
        }
        $data=[
            'role_name'=>$role_name
        ];
        $res=$role_model::where('role_id',$role_id)->update($data);
        if($res){
            return $this->apiOutPut(200,'修改成功',$count);
        }else{
            return $this->apiOutPut(000000,'修改失败',$count);
        }
    }
    /**
     * 角色添加权限
     */
    public function roleAddPriv($id)
    {
        //角色名称
       $role_model=new RoleModel();
        $role_data=$role_model::where('role_id',$id)->first();
        //权限
        $priv_model=new PrivModel();
        $priv_data=$priv_model->where('is_del',1)->get();
//        var_dump($priv_data);die;
        return view('admin/role/roleAddPriv',['role_data'=>$role_data,'priv_data'=>$priv_data]);
    }
    /**
     * 角色添加权限执行
     */
    public function roleAddPrivDo(Request $request)
    {
       $role_id=$request->post('role_id');
        $priv_id=$request->post('priv_id');
        if(empty($priv_id)){
            return $this->apiOutPut(000000,'角色分类不能为空','');
        }
       $role_priv_model=new RolePrivModel();
        foreach($priv_id as $k=>$v){
            $data=[
                'role_id'=>$role_id,
                'priv_id'=>$v
            ];
            $res=$role_priv_model::insert($data);
        }
        if($res){
            return $this->apiOutPut(200,'给角色赋权限成功',$res);
        }else{
            return $this->apiOutPut(000000,'角色赋权限失败',$res);
        }
    }
    /**
     * 角色权限展示
     */
    public function rolePrivIndex($id)
    {
        $pageSize=config('app.pageSize');
        $role_priv_model=new RolePrivModel();
        $where=[
            ['shop_role_priv.role_id','=',$id]
        ];
        $role_priv_data=$role_priv_model::leftJoin('shop_role','shop_role.role_id','=','shop_role_priv.role_id')
            ->leftJoin('shop_priv','shop_priv.priv_id','=','shop_role_priv.priv_id')
            ->where($where)
            ->paginate($pageSize);
//        print_r($role_priv_data);die;
       return view('admin/role/rolePrivIndex',['role_priv_data'=>$role_priv_data]);
    }
    /**
     * 角色名称的即点即改
     */
    public function changeRole(Request $request)
    {
       //获取新值
        $new_value=$request->post('new_value');
        //获取下标
        $field=$request->post('field');
        //获取ID
        $role_id=$request->post('role_id');
        $role_model=new RoleModel();
        $res=$role_model::where('role_id',$role_id)->update([$field=>$new_value]);
        if($res){
            return $this->apiOutPut(200,'角色名称即点即改成功',$res);
        }else{
            return $this->apiOutPut(000000,'角色名称即点即改失败',$res);
        }
    }

}
