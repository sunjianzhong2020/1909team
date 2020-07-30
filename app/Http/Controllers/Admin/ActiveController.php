<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Active;

class ActiveController extends CommonController
{
    public function activeadd(){

    	return view('/admin/active/activeadd');
    }

    public function activedo(Request $request){
    	$arr=$request->all();
    	//dd($arr);
    	//验证名称是非为空
    	//echo $arr['a_name'];die;./
    	$a_name=$arr['a_name'];
    	// dd($a_name);exit;
    	if(empty($a_name)){
    		return $this->apiOutPut('000000','名称必填');
    		exit;
    	}

    	//验证url是非为空
    	$a_url=$arr['a_url'];
    	if(empty($a_url)){
    		return $this->apiOutPut('000000','url必填');
    		exit;
    	}


    	$is_show=$arr['is_show'];
    	$res['a_name'] = $a_name;
        $res['a_url'] = $a_url;
        $res['is_show'] = $is_show;
        $res['addtime'] = time();
        //验证名称唯一性
        $data=Active::where(['a_name'=>$a_name])->first();
        
        if($data){
        	return $this->apiOutPut('000000','名称已存在,请你mb快点换个名');
        }
        //入库
        $is_show = $arr['is_show'];
        $info['a_name']=$a_name;
        $info['a_url']=$a_url;
        $info['is_show']=$is_show;
        $info['addtime']=time();

        //print_r($info);
        $kkp = Active::insert($info);
        //dd($kkp);die;
        if($kkp){
        	return $this->apiOutPut('200','添加成功');
        }else{
        	return $this->apiOutPut('000001','添加失败');
        }
    }

    public function activeshow(Request $request){
    	$data = Active::where("status",1)->paginate(2);
    	return view('admin/active/activeshow',['data'=>$data]);
    }

    public function activedel(Request $request){
    	$arr=$request->all();
    	//dd($arr);
    	$a_id=$arr['a_id'];
    	$res = Active::where('a_id',$a_id)->update(['status'=>2]);
    	//dd($res);
    	if($res){
    		return $this->apiOutPut('200','删除成功');
    	}else{	
    		return $this->apiOutPut('000001','删除失败');
    	}
    }
}
