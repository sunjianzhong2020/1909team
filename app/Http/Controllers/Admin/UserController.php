<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use App\Models\AdminRoleModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends CommonController
{
    /**
     * 给用户添加角色
     */
    public function userAddRole($id)
    {
        //用户名
        $user_model=new AdminModel();
        $user_data=$user_model::where('admin_id',$id)->first();
        //角色
        $role_model=new RoleModel();
        $role_data=$role_model::get();
        return view('admin/user/userAddRole',['user_data'=>$user_data,'role_data'=>$role_data]);
    }
    /**
     * 用户添加角色执行
     */
    public function userAddRoleDo(Request $request)
    {
        $admin_id=$request->post('admin_id');
        $role_id=$request->post('role_id');
        foreach($role_id as $k=>$v){
            $admin_role_model=new AdminRoleModel();
            $data=[
                'admin_id'=>$admin_id,
                'role_id'=>$v,
            ];
            $res=$admin_role_model::insert($data);

        }
        if($res){
            return $this->apiOutPut('200','用户角色添加成功',$res);

        }else{
            return $this->apiOutPut('000000','用户角色添加失败',$res);

        }
    }
    /**
     * 用户角色展示
     */
    public function userRoleIndex($id)
    {
//        echo 4;die;
       $where=[
           ['shop_admin_role.admin_id','=',$id]
       ];
        $admin_role_model=new AdminRoleModel();
        $admin_role_data=$admin_role_model::leftJoin('shop_admin','shop_admin.admin_id','=','shop_admin_role.admin_id')
            ->leftJoin('shop_role','shop_role.role_id','=','shop_admin_role.role_id')
            ->where($where)
            ->get();
//        var_dump($admin_role_data);die;
       return view('admin/user/userRoleIndex',['admin_role_data'=>$admin_role_data]);


    }
    /**
     * 用户管理
     */
    public function userIndex(){
        $user_model=new AdminModel();;
        $user_data=$user_model->where('is_del',1)->get();

        return view('admin/user/userIndex',['user_data'=>$user_data]);
    }
    /**
     * 用户删除
     */
    public function userDel(Request $request)
    {
        $admin_id=$request->post('admin_id');
        $user_model=new AdminModel();
        $res=$user_model::where('admin_id',$admin_id)->update(['is_del'=>2]);
       if($res){
           return $this->apiOutPut(200,'删除成功',$res);

       }else{
           return $this->apiOutPut(000000,'删除失败',$res);

       }
    }
    /**
     * 用户修改
     */
    public function userEdit($id)
    {
        $user_model=new AdminModel();
        $user_data=$user_model::where('admin_id',$id)->first();
        return view('admin/user/userEdit',['user_data'=>$user_data]);
    }
    /**
     * 用户修改执行
     */
    public function userEditDo(Request $request)
    {
        $admin_id=$request->post('admin_id');
        $admin_name=$request->post('admin_name');
        if(empty($admin_name)){
             return $this->apiOutPut(000000,'用户名不能为空',$admin_name);
        }
        $data=[
            'admin_name'=>$admin_name
        ];
        $user_model=new AdminModel();
        $where=[
            ['admin_name','=',$admin_name],
           ['admin_id','!=',$admin_id]
        ];
        $count=$user_model::where($where)->count();
        if($count>0){
            return $this->apiOutPut(000000,'该用户名称已存在',$count);
        }
        $res=$user_model::where('admin_id',$admin_id)->update($data);

        if($res){
            return $this->apiOutPut(200,'修改成功',$res);

        }else{
            return $this->apiOutPut(000000,'修改失败',$res);

        }


    }

}
