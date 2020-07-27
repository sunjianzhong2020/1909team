<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Cate;
class BrandController extends CommonController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 商品品牌页面
     */
    public function brandAdd()
    {
        $cate = Cate::get();
        return view('admin/brand/brandAdd',['cate' => $cate]);
    }

    /**
     * @param Request $request
     * 文件上传
     */
    public function upload(Request $request)
    {
        //print_r($_FILES);die;
        $fileinfo = $_FILES['Filedata'];
        #上传临时文件
        $tmpName = $fileinfo['tmp_name'];
        #文件扩展名
        $ext = explode(".", $fileinfo['name'])[1];
        #新文件名字
        $newFileName = md5(uniqid()) . "." . $ext;
        $newFilePath = "./uploads/" . Date("Y/m/d", time());
        if (!is_dir($newFilePath)) {
            mkdir($newFilePath, 0777, true);
        }
        $newFilePath = $newFilePath . $newFileName;
        move_uploaded_file($tmpName, $newFilePath);
        $newFilePath = ltrim($newFilePath);
        $newFilePath = trim($newFilePath,'.');
        echo $newFilePath;
    }

    /**
     * @param Request $request
     * @return array
     * 商品品牌执行添加
     */
    public function brandAdd_do(Request $request)
    {
        $arr = $request -> all();
//        var_dump($arr);exit;
        $b_name = $arr['b_name'];
        if(empty($b_name)){
            return $this -> apiOutPut('000001','商品品牌名称不能为空');
            exit;
        }
        $b_url = $arr['b_url'];
        if(empty($b_url)){
            return $this -> apiOutPut('000001','商品品牌网址不能为空');
            exit;
        }
        $b_desc = $arr['b_desc'];
        if(empty($b_desc)){
            return $this -> apiOutPut('000001','商品品牌描述不能为空');
            exit;
        }
        $c_id = $arr['c_id'];
        $is_show = $arr['is_show'];
        $b_img2 = $arr['b_img2'];
        $data['b_name'] = $b_name;
        $data['b_url'] = $b_url;
        $data['b_desc'] = $b_desc;
        $data['b_img'] = $b_img2;
        $data['c_id'] = $c_id;
        $data['is_show'] = $is_show;
        $data['add_time'] = time();


        $obj = Brand::where(['b_name' => $b_name])->first();
        if($obj){
            return $this -> apiOutPut('000001','商品品牌名称已存在');
            exit;
        }
        $brand_info = Brand::insert($data);
        if($brand_info){
            return $this -> apiOutPut('200','分类添加成功',$brand_info);
        }else{
            return $this -> apiOutPut('000001','分类添加失败');
        }
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 展示页面
     */
    public function brandShow()
    {
        $where=[
            ['shop_brand.status','=',1]
        ];
        $data = Brand::leftjoin('shop_cate','shop_cate.c_id','=','shop_brand.c_id')->where($where)->paginate(2);
//        dd($data);
        return view('admin/brand/brandShow',['data' => $data]);
    }

    /**
     * @param Request $request
     * 品牌删除
     */
    public function brandDel(Request $request)
    {
         $arr = $request -> all();
         $b_id = $arr['b_id'];
         $data = Brand::where('b_id',$b_id)->update(['status' => 2]);
        if($data){
            return $this->apiOutPut('200','删除成功',$data);
        }else{
            return $this->apiOutPut('000001','删除失败');
        }
    }
}
