<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cate;
class CateController extends CommonController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 分类添加页面
     */
     public function cateAdd()
     {
        $res=Cate::get()->toArray();
        $cate=Cate::createTree($res);
         return view('admin/cate/cateAdd',['res'=>$res,'cate'=>$cate]);
     }

    /**
     * @param Request $request
     * @return array
     * 分类执行添加页面
     */
     public function cateAdd_do(Request $request)
     {
         $arr = $request -> all();
//         var_dump($data);
         $c_name = $arr['c_name'];
         $p_id=$arr['p_id'];
         if(empty($c_name)){
             return $this -> apiOutPut('000001','分类名称不能为空');
             exit;
         }
         $c_words = $arr['c_words'];
         if(empty($c_words)){
             return $this -> apiOutPut('000001','分类关键字不能为空');
             exit;
         }
         $c_desc = $arr['c_desc'];
         if(empty($c_desc)){
             return $this -> apiOutPut('000001','分类描述不能为空');
             exit;
         }
         $data['c_name'] = $c_name;
         $data['c_words'] = $c_words;
         $data['c_desc'] = $c_desc;
         $data['addtime'] = time();
         $data['p_id']=$p_id;
         $obj = Cate::where(['c_name' => $c_name])->first();
         if($obj){
             return $this -> apiOutPut('000001','分类名称已存在');
             exit;
         }
         $cate_info = Cate::insert($data);
         if($cate_info){
             return $this -> apiOutPut('200','分类添加成功',$cate_info);
         }else{
             return $this -> apiOutPut('000001','分类添加失败');
         }
     }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 分类展示
     */
     public function cateShow()
     {
         $data = Cate::where('status',1)->paginate(2);
         return view('admin/cate/cateShow',['data' => $data]);
     }

    /**
     * @param Request $request
     * 分类删除
     */
     public function cateDel(Request $request)
     {
        $arr = $request -> all();
        $id = $arr['c_id'];
        $data = Cate::where('c_id',$id)->update(['status'=> 2]);
        if($data){
            return $this->apiOutPut('200','分类删除成功',$data);
        }else{
            return $this->apiOutPut('000001','分类删除失败');
        }

     }
}
