<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;


class BannerController extends CommonController
{
        public function banneradd(){
            return view('admin/banner/banneradd');
        }

        public function bannerdo(Request $request){
            $arr = $request->all();
            //dd($arr);
            $b_name = $arr['b_name'];
            if(empty($b_name)){
            	return $this->apiOutPut('000000','导航栏名称必填');
            	exit;
            }
            $b_url = $arr['b_url'];
            if(empty($b_url)){
            	return $this->apiOutPut('000000','导航栏链接必填');
            	exit;
            }
            $is_show = $arr['is_show'];
            $res['b_name'] = $b_name;
            $res['b_url'] = $b_url;
            $res['is_show'] = $is_show;
            $res['addtime'] = time();

            $data = Banner::where(['b_name'=>$b_name])->first();
            if($data){
            	return $this->apiOutPut('000000','导航栏名称已存在');
            }

            $sks = Banner::insert($res);
            // print_r($sks);exit;
            if($sks){
            	return $this->apiOutPut('200','添加成功',$sks);
            }else{
            	return $this->apiOutPut('000001','添加失败');
            }
        }

        public function bannershow(Request $request){
        	$data = Banner::where("status",1)->paginate(2);

        	return view('admin/banner/bannershow',['data'=>$data]);
        }


        public function bannerdel(Request $request){
        	$arr = $request->all();
        	// dd($arr);
        	$b_id = $arr['b_id'];
        	// dd($b_id);
        	$data = Banner::where('b_id',$b_id)->update(['status'=>2]);
        	// dd($data);
        	if($data){
        		return $this->apiOutPut('200','删除成功',$data);
        	}else{
        		return $this->apiOutPut('000001','删除失败');
        	}
        }

}
