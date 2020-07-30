<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends CommonController
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 登录页面
     */
    public function loginAdd(Request $request)
    {
        return view('index/login/loginAdd');
    }

    /**
     * @param Request $request
     * @return array
     * 执行登录页面
     */
    public function logAdd_do(Request $request)
    {
      $arr = $request -> all();
      $user_name = $arr['user_name'];
      if(empty($user_name)){
         return $this->apiOutPut('000001','用户名不能为空');
      }
      $user_pwd = $arr['user_pwd'];
     if(empty($user_pwd)){
        return $this->apiOutPut('000001','密码不能为空');
     }
     $user_info = User::where('user_name',$user_name)->first();
     if($user_info){
         if($user_info->user_pwd != md5($user_pwd)){
             return $this->apiOutPut('000001','密码不正确');
         }
         return $this->apiOutPut('200','登录成功',$user_info);
     }else{
         return $this->apiOutPut('000001','登录失败');
     }
       
    }
}
