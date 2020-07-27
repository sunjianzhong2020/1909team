<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Friend;



class FriendController extends CommonController
{
	/**
	 * 友情链接添加页面
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
    public function friendAdd(Request $request){
    	return view('admin/friend/friendAdd');
    }

    /**
     * 友情链接执行添加
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function friendAdd_do(Request $request){
        $arr = $request -> all();
        // dd($arr);
        $f_name = $arr['f_name'];
        // echo $f_name;die;
        if(empty($f_name)){
        	return $this->apiOutPut('000000','友情链接名称必填');
        	exit;
        }
        $f_url = $arr['f_url'];
        // echo $f_url;die;
      	if(empty($f_url)){
        	return $this->apiOutPut('000000','友情链接地址必填');
        	exit;
        }


        $res['f_name'] = $f_name;
        $res['f_url'] = $f_url;
        $res['addtime'] = time();
        $data = Friend::where(['f_name'=>$f_name])->first();
        if($data){
        	return $this->apiOutPut('000000','友情链接名称已存在');
        }
        $nno = Friend::insert($res);
        if($nno){
        	return $this->apiOutPut('200','添加成功',$nno);
        }else{
       		return $this->apiOutPut('000001','添加失败'); 	
        }
    }
    /**
     * 友情链接展示
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function friendShow(Request $request){
    	$data = Friend::paginate(2);
    	// print_r($data);
    	// exit;
    	return view('/admin/friend/friendShow',['data'=>$data]);
    }

 	
 	/**
 	 * 友情链接删除
 	 * @param  Request $request [description]
 	 * @return [type]           [description]
 	 */
 	public function friend_del(Request $request){
         $arr = $request -> all();
 		 $f_id = $arr['f_id'];
 		 //print_r($f_id);
         $data = Friend::where('f_id',$f_id)->delete(['status' => 2]);
 		 if($data){
 		 	return $this->apiOutPut('200','删除成功',$data);
 		 }else{
 		 	return $this->apiOutPut('000001','删除失败');

 		 }
 	}   
}