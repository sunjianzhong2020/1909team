<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ment;
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
//        var_dump($aa);exit;
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

}
