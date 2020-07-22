<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use Illuminate\Http\Request;

class RegisterController extends CommonController
{
    /**
     * 用户注册的视图
     */
    public function register()
    {
        return view('admin/register/register');
    }
    /**
     * 注册执行
     */
    public function registerDo(Request $request)
    {
        $admin_name=$request->post('admin_name');
        $admin_pwd=$request->post('admin_pwd');
        if(empty($admin_name)){
            return $this->apiOutPut('000000','用户名不能为空',$admin_name);
        }
        if(empty($admin_pwd)){
            return $this->apiOutPut('000000','密码不能为空',$admin_pwd);
        }
        $admin_pwd=md5($admin_pwd);
        $user_model=new AdminModel();
        $where=[
            ['admin_name','=',$admin_name]
        ];
        $data=[
            'admin_name'=>$admin_name,
            'admin_pwd'=>$admin_pwd,
            'add_time'=>time()
        ];
        $count=$user_model::where($where)->count();
        if($count>0){
            return $this->apiOutPut('000000','该用户已存在',$count);
        }
        $res=$user_model::insert($data);
        if($res){
            return $this->apiOutPut('200','注册成功',$res);

        }else{
            return $this->apiOutPut('000000','注册失败',$res);

        }
    }
}
