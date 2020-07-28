<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Code;
use App\Models\Phone;
class RegisterController extends CommonController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 注册页面
     */
    public function regAdd()
    {
        return view('index/register/regAdd');
    }

    /**
     * @param Request $request
     * @return array
     * 发送短信验证码
     */
    public function verify(Request $request)
    {
        $phone = $request -> post('phone');
//        print_r($phone);
        if(empty($phone)){
            return $this->apiOutPut('000001','手机号不能为空');
        }else{
            #验证用户是否可以发送短信 【一分钟只能发送1条】
            $code_model = new Code();
            $phone_model= new Phone();
            #获取当前时间
            $now = time();
            #限制同一个手机号1分钟发送一条短信
            $where = [
                ['addtime','>=', $now-60],
                ['phone','=',$phone]
            ];
            if($code_model->where($where)->count() > 0){
                return $this -> apiOutPut('000000','短信验证码发送太过频繁');
            }
            #限制同一个手机号一天只能发送10条短信
            $start_time = strtotime(date('Y-m-d 00:00:00'));
            $one_day_where = [
                ['addtime','>=', $start_time],
                ['phone','=',$phone]
            ];
            #查询今天一天的短信条数是否大于10条
            if($code_model->where($one_day_where)->count() > 10){
                return $this -> apiOutPut('000000','短信验证码发送次数超出上限');
            }
            #调用短信验证码发送接口
            $re = $phone_model->send_code($phone);

            #发送成功给出对应的提示
            if ($re) {
                return $this -> apiOutPut('000001','发送成功');
            } else {
                return $this -> apiOutPut('000000','发送失败');
            }
        }
    }


    /**
     * @param Request $request
     * @return array
     * 执行注册
     */
    public function regAdd_do(Request $request)
    {
       $arr = $request -> all();
//       print_r($arr);
        $user_name = $arr['user_name'];
        if(empty($user_name)){
            return $this -> apiOutPut('000001','用户名不能为空');
            exit;
        }
        $user_pwd = $arr['user_pwd'];
        if(empty($user_pwd)){
            return $this -> apiOutPut('000001','密码不能为空');
            exit;
        }
        $user_new_pwd = $arr['user_new_pwd'];
        if(empty($user_new_pwd)){
            return $this -> apiOutPut('000001','确认密码不能为空');
            exit;
        }
        if($user_pwd != $user_new_pwd){
            return $this -> apiOutPut('000001','两次密码输入不一样 ');
            exit;
        }
        $phone = $arr['phone'];
        if(empty($phone)){
            return $this -> apiOutPut('000001','手机号不能为空');
            exit;
        }
        $code = $arr['code'];
        if(empty($code)){
            return $this -> apiOutPut('000001','验证码不能为空');
            exit;
        }
        $data['user_name'] = $user_name;
        $data['user_pwd'] = md5($user_pwd);
        $data['user_new_pwd'] = md5($user_new_pwd);
        $data['phone'] = $phone;
        $data['addtime'] = time();
        $obj = User::where(['user_name' => $user_name])->first();
        if($obj){
            return $this -> apiOutPut('000001','用户名称已存在');
            exit;
        }
        $res = User::insert($data);
        if($res){
            return $this->apiOutPut('200','注册成功',$res);
        }else{
            return $this->apiOutPut('000001','注册失败');
        }
    }



}
