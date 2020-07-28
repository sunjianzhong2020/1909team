<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
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


    public function loginAdd_do(Request $request)
    {
      $arr = $request -> all();
      $user_name = $arr['user_name'];
      if($user_name){
         return $this->apiOutPut('000001','用户名不能为空');
      }
      $user_pwd = $arr['user_pwd'];
     if($user_pwd){
        return $this->apiOutPut('000001','密码不能为空');
     }
       
    }
}
