<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consumer;
use App\Models\Work;
use Illuminate\Support\Facades\DB;

class ConsumerController extends CommonController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 个人信息添加
     */
    public function consumerAdd()
    {
        $work = Work::get();
//        dd($work);
      return view('index/consumer/consumerAdd',['work' => $work]);
    }

    /**
     * @param Request $request
     * @return array
     * 个人信执行添加
     */
    public function consumerAdd_do(Request $request)
    {
        $arr = $request -> all();
//        var_dump($arr);die;
        $con_name = $arr['con_name'];
        if(empty($con_name)){
            return $this->apiOutPut('000001','昵称不能为空');
        }
        $con_sex = $arr['con_sex'];
        $con_year = $arr['con_year'];
        $con_month = $arr['con_month'];
        $con_day = $arr['con_day'];
        $con_country = $arr['con_country'];
        $con_city = $arr['con_city'];
        $con_area = $arr['con_area'];
        $w_id = $arr['w_id'];

        $data['con_name'] = $con_name;
        $data['con_sex'] = $con_sex;
        $data['con_year'] = $con_year;
        $data['con_month'] = $con_month;
        $data['con_day'] = $con_day;
        $data['con_country'] = $con_country;
        $data['con_city'] = $con_city;
        $data['con_area'] = $con_area;
        $data['w_id'] = $w_id;
        $data['addtime'] = time();
        $obj = Consumer::where(['con_name' => $con_name])->first();
        if($obj){
            return $this -> apiOutPut('000001','昵称已存在');
            exit;
        }

        $data = Consumer::insert($data);
        if($data){
            return $this->apiOutPut('200','注册成功',$data);
        }else{
            return $this->apiOutPut('000001','注册失败');
        }

    }

}
