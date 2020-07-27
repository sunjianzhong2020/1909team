<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use Illuminate\Http\Request;
use App\Models\Cate;
use App\Models\Brand;
class GoodsController extends CommonController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 商品添加
     */
    public function goodsAdd()
    {
        $cate = Cate::get();
        $brand = Brand::get();
        return view('admin/goods/goodsAdd',['cate'=>$cate,'brand'=>$brand]);
    }

    /**
     * @param Request $request
     * 商品文件上传
     */
    public function uploads()
    {
        //print_r($_FILES);die;
        $fileinfo = $_FILES['Filedata'];
        #上传临时文件
        $tmpName = $fileinfo['tmp_name'];
        #文件扩展名
        $ext = explode(".", $fileinfo['name'])[1];
        #新文件名字
        $newFileName = md5(uniqid()) . "." . $ext;
        $newFilePath = "./upload/" . Date("Y/m/d", time());
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
     * 商品执行添加
     */
    public function goodsAdd_do(Request $request)
    {
       $arr = $request -> all();
//       dd($arr);
       $goods_name = $arr['goods_name'];
       if(empty($goods_name)){
            return $this -> apiOutPut('000001','商品名称不能为空');
            exit;
        }
        $goods_price = $arr['goods_price'];
        if(empty($goods_price)){
            return $this -> apiOutPut('000001','商品价格不能为空');
            exit;
        }
        $goods_desc = $arr['goods_desc'];
        if(empty($goods_desc)){
            return $this -> apiOutPut('000001','商品描述不能为空');
            exit;
        }
        $goods_num = $arr['goods_num'];
        if(empty($goods_num)){
            return $this -> apiOutPut('000001','商品描述不能为空');
            exit;
        }
        $goods_sn = $arr['goods_sn'];
        if(empty($goods_sn)){
            return $this -> apiOutPut('000001','商品描述不能为空');
            exit;
        }
        $is_new = $arr['is_new'];
        $is_show = $arr['is_show'];
        $is_best = $arr['is_best'];
        $c_id = $arr['c_id'];
        $b_id = $arr['b_id'];
        $goods_img2 = $arr['goods_img2'];
        $data['goods_name'] = $goods_name;
        $data['goods_price'] = $goods_price;
        $data['goods_desc'] = $goods_desc;
        $data['goods_num'] = $goods_num;
        $data['goods_sn'] = $goods_sn;
        $data['is_new'] = $is_new;
        $data['is_show'] = $is_show;
        $data['is_best'] = $is_best;
        $data['c_id'] = $c_id;
        $data['b_id'] = $b_id;
        $data['goods_img'] = $goods_img2;
        $data['addtime'] = time();
        $obj = Goods::where(['goods_name' => $goods_name])->first();
        if($obj){
            return $this -> apiOutPut('000001','商品名称已存在');
            exit;
        }
        $goods_info = Goods::insert($data);
        if($goods_info){
            return $this -> apiOutPut('200','商品添加成功',$goods_info);
        }else{
            return $this -> apiOutPut('000001','商品添加失败');
        }
    }

    /**
     * @param Request $request
     * 商品展示页面
     */
    public function goodsShow(Request $request)
    {
        $where = [
            ['shop_goods.status','=',1]
        ];
        $data = Goods::leftjoin('shop_brand','shop_goods.b_id','=','shop_brand.b_id')
                       ->join('shop_cate','shop_goods.c_id','=','shop_cate.c_id')
                       ->where($where)
                       ->paginate(2);
        return view('admin/goods/goodsShow',['data' => $data]);
    }

    /**
     * @param Request $request
     * @return array
     * 商品删除页面
     */
    public function goodsDel(Request $request)
    {
        $arr = $request -> all();
        $id = $arr['id'];
        $data = Goods::where('goods_id',$id)->update(['status' => 2]);
        if($data){
            return $this->apiOutPut('200','删除成功',$data);
        }else{
            return $this->apiOutPut('000001','删除失败');
        }
    }
}
