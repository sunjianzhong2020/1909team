<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ment;
use App\Models\Mentmodels;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MentController extends Controller
{
    //
    public function cateadd(Request $request)
    {
        return view('admin.ment.cateadd');
    }

    public function cateadddo(Request $request)
    {
        $aa = $request->all();
        $mentmodel = new Ment();
        $shop_ment_cate_name = $request->shop_ment_cate_name;
        $once = DB::table('shop_ment_cate')->where('shop_ment_cate_name', $shop_ment_cate_name)->first();
        if ($once) {
            echo json_encode(['errno' => 00001, 'msg' => '所写类型已经存在,请在广告添加管理中选择']);
            exit;
        } else {
            $arr = array(
                'shop_ment_cate_name' => $shop_ment_cate_name,
            );
            $res = DB::table('shop_ment_cate')->insert($arr);
            if ($res) {
                echo json_encode(['errno' => 00000, 'msg' => '添加成功']);
            } else {
                echo json_encode(['errno' => 00001, 'msg' => '添加失败']);
                exit;
            }
        }
    }

    public function catelist(Request $request)
    {
        $mentmodel = new Ment();
        $arr = DB::table('shop_ment_cate')->paginate(2);
        return view('admin.ment.catelist', ['arr' => $arr]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * 广告分类删除
     */
    public function catedel($id)
    {
        $mentmodel = new Ment();
        $where [] = [
            'shop_ment_cate_id', '=', $id
        ];
        $res = Ment::where($where)->delete();
        if ($res) {
            return redirect('ment/catelist');
        }

    }
    public function cateedit($id){
        $mentmodel = new Ment();
        $res =  $mentmodel->where('shop_ment_cate_id',$id)->first();
        return view('admin.ment.cateedit',['res'=>$res]);
    }
    public function cateupdate(Request $request){
        $aa = $request->all();
//        var_dump($aa['shop_ment_cate_id']);exit;
        $mentmodel = new Ment();
        $once = DB::table('shop_ment_cate')->where('shop_ment_cate_name', $aa['shop_ment_cate_name'])->first();
        if(empty($once)){
            $info = $mentmodel->where('shop_ment_cate_id',$aa['shop_ment_cate_id'])->update($aa);
//            var_dump($info);exit;
            if($info){
                echo json_encode(['errno' => 00000, 'msg' => '修改成功']);
            } else {
                echo json_encode(['errno' => 00001, 'msg' => '修改失败']);
                exit;
            }
        }else{
            echo json_encode(['errno' => 00001, 'msg' => '所写类型已经存在,请在广告添加管理中选择']);
            exit;
        }
    }

    /**
     * 广告RBAC
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mentlist(Request $request)
    {
        $mentcate=Ment::get();
        $mentmodel = new Ment();
        $res =DB::table('shop_ment')->leftjoin('shop_ment_cate','shop_ment_cate.shop_ment_cate_id','=','shop_ment.shop_ment_cate_id')->where(["shop_ment_del"=>2])->paginate(5);
//        print_r($res);
        return view('admin.ment.mentlist',['res'=>$res,"mentcate"=>$mentcate]);
    }
    public function mentadd(Request $request)
    {


        $bb = $request->all();
//        dd($bb);
        $mentmodels = new Mentmodels();
//        $shop_ment_url = $request->shop_ment_url;
        $on = DB::table('shop_ment')->where('shop_ment_url', $bb['shop_ment_url'])->first();
        if ($on) {
            echo json_encode(['errno' => 00001, 'msg' => '网址已被注册']);
            exit;
        } else {
//            $arr = array(
//                'shop_ment_url' =>  $bb['shop_ment_url'],
//            );
            $res = DB::table('shop_ment')->insert($bb);
            if ($res) {
                echo json_encode(['errno' => 00000, 'msg' => '添加成功']);
            } else {
                echo json_encode(['errno' => 00001, 'msg' => '添加失败']);
                exit;
            }
        }
    }
    public function mentdel($id)
    {
        $mentmodels = new Mentmodels();
        $where=[
            ['shop_ment_id', '=', $id]
        ];
//        dd($where);
        $res = $mentmodels->where($where)->delete();

        if ($res) {
            return redirect('ment/mentlist');
        }

    }

    public function mentedit($id){
        $mentmodel = new Ment();
        $res =  $mentmodel->get();

        $mentmodels = new Mentmodels();
        $rec =   $mentmodels->where('shop_ment_id',$id)->first();
        return view('admin.ment.mentedit',['res'=>$res,"rec"=>$rec]);
    }
    public function mentupdate(Request $request){
        $bb = $request->all();
//        var_dump($aa['shop_ment_cate_id']);exit;
        $mentmodels = new Mentmodels();
        $once = DB::table('shop_ment')->where('shop_ment_url', $bb['shop_ment_url'])->first();
        if(empty($once)){
            $info = $mentmodels->where('shop_ment_id',$bb['shop_ment_id'])->update($bb);
//            var_dump($info);exit;
            if($info){
                echo json_encode(['errno' => 00000, 'msg' => '修改成功']);
            } else {
                echo json_encode(['errno' => 00001, 'msg' => '修改失败']);
                exit;
            }
        }else{
            echo json_encode(['errno' => 00001, 'msg' => '网址已存在']);
            exit;
        }
    }
    public function mentupload(Request $request)
    {
        //print_r($_FILES);die;
        $fileinfo = $_FILES['Filedata'];
        #上传临时文件
        $tmpName = $fileinfo['tmp_name'];
        #文件扩展名
        $ext = explode(".", $fileinfo['name'])[1];
        #新文件名字
        $newFileName = md5(uniqid()) . "." . $ext;
        $newFilePath = "./imgs/" . Date("Y/m/d", time());
        if (!is_dir($newFilePath)) {
            mkdir($newFilePath, 0777, true);
        }
        $newFilePath = $newFilePath . $newFileName;
        move_uploaded_file($tmpName, $newFilePath);
        $newFilePath = ltrim($newFilePath);
        $newFilePath = trim($newFilePath,'.');
        echo $newFilePath;
    }
    public function changevalue(Request $request)
    {
        $shop_id = $request->post('shop_id');
        $shop_title = $request->post('shop_title');
        $shop_value = $request->post('new_value');
        $res=DB::table('shop_ment')->where('shop_ment_id',$shop_id)->update([$shop_title=>$shop_value]);
        if($res){
            echo json_encode(['errno' => 00000, 'msg' => '成功']);
        }else{
            echo json_encode(['errno' => 00001, 'msg' => '失败']);
            exit;
        }
    }
}
