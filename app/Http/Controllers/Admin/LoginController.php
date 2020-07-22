<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use Illuminate\Http\Request;

class LoginController extends CommonController
{
    /**
     * 登录的视图
     */
    public function login()
    {
        return view('admin/login/login');
    }
    /**
     * 登录执行
     */
    public function loginDo(Request $request)
    {
       $admin_name=$request->post('admin_name');
        $admin_pwd=$request->post('admin_pwd');
        if(empty($admin_name)){
            return $this->apiOutPut('000000','用户名不能为空',$admin_name);
        }
           if(empty($admin_pwd)){
            return $this->apiOutPut('000000','密码不能为空',$admin_pwd);
        }

        $where=[
            ['admin_name','=',$admin_name]
        ];
        $user_model=new AdminModel();
        $count=$user_model::where($where)->count();
        if($count<1){
            return $this->apiOutPut('000000','该用户不存在',$count);
        }
        $info=$user_model::where($where)->first();
        if(md5($admin_pwd)!=$info->admin_pwd){
            return $this->apiOutPut('000000','密码输入错误',$count);
        }
        if($admin_name==$info->admin_name && md5($admin_pwd)==$info->admin_pwd){
            $request->session()->put(['admin_id'=>$info['admin_id']]);
            $request->session()->save();
            return $this->apiOutPut('200','登陆成功',$count);
        }else{
            return $this->apiOutPut('000000','登录失败',$count);
        }
    }
}
