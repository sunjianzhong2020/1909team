<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Student;

class StudentController extends CommonController
{
    public function add(Request $request){
    	$data = DB::table('class')->get();
    	// dd($data);
    	return view('student\add',['data'=>$data]);
    }

    public function add_do(Request $request){
    	$arr = $request->all();
    	// dd($arr);
    	// 验证名称非空
    	$s_name=$arr['s_name'];
    	if(empty($s_name)){
    		return $this->apiOutPut('000000','学生名称必填');
    		exit;
    	}
    	//验证年龄非空
    	$s_age=$arr['s_age'];
    	if(empty($s_age)){
    		return $this->apiOutPut('000000','年龄必填');
    		exit;
    	}
    	//验证班级非空
    	$c_id=$arr['c_id'];
    	if(empty($c_id)){
    		return $this->apiOutPut('000000','班级必选');
    		exit;
    	}

    	$data = Student::where(['s_name'=>$s_name])->first();
    	if($data){
    		return $this->apiOutPut('000000','学生名称已存在');
    		exit;
    	}

    	$kkp=Student::insert($arr);
    	// dd($kkp);
    	if($kkp){
    		return $this->apiOutPut('200','添加成功',$kkp);
    	}else{
    		return $this->apiOutPut('000000','添加失败');
    	}
    }

    public function show(Request $request){
    	$data = Student::get();
    	//dd($data);
    	return view("student/show",['data'=>$data]);
    }

    public function del(Request $request){
    	$arr=$request->all();
    	// dd($arr);
    	$s_id=$arr['s_id'];
    	// dd($s_id);
    	$data = Student::where('s_id',$s_id)->delete();
    	// dd($data);
    	if($data){
    		return $this->apiOutPut('200','删除成功',$data);
    	}else{
    		return $this->apiOutPut('000000','删除失败');
    	}
    }
}