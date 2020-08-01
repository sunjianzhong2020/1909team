<?php
namespace App\Http\Controllers\Index;
use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Area;
class AddressController extends Controller
{
    //展示页面
    public function ressadd(Request $request){
        //查询到所有pid为0的省
        $area = DB::table('shop_area')->where(["pid"=>0])->get();
        $xym = DB::table('shop_address')->get()->toArray();
        //循环覆盖地址id
        $xym=array_map('get_object_vars', $xym);
//        dd($xym);
        $arr=[];
            foreach($xym as $k=>$v) {
                $aa = Area::where('id', $v['shop_address_province'])->pluck('name');
                $v['shop_address_province'] = $aa[0];
                $bb = Area::where('id', $v['shop_address_city'])->pluck('name');
                $v['shop_address_city'] = $bb[0];
                $cc = Area::where('id', $v['shop_address_area'])->pluck('name');
                $v['shop_address_area'] = $cc[0];
                $arr[]=$v;
            }
//        dd($arr);
        return view('index/address',["area"=>$area,"xym"=>$arr]);
    }
    //查找市级名字
    public function gitcity(Request $request){
       $id =  $request->post('id');
        $where = ['pid'=>$id];
        $res = DB::table('shop_area')->where($where)->get();
        echo json_encode($res,JSON_UNESCAPED_UNICODE);
    }
//添加页面
    public function dizhiadd(Request $request){
        $dizhi = $request->all();
        $bb = DB::table('shop_address')->where('shop_address_name', $dizhi['shop_address_name'])->first();
        if ($bb) {
            echo json_encode(['errno' => 00001, 'msg' => '用户名已被注册']);
            exit;
        } else {
            $cc = DB::table('shop_address')->insert($dizhi);
            if ($cc) {
                echo json_encode(['errno' => 00000, 'msg' => '添加成功']);
            } else {
                echo json_encode(['errno' => 00001, 'msg' => '添加失败']);
                exit;
            }
        }
    }
    //执行修改
    public function dizhiupload(Request $request){
        $dizhi = $request->all();
//        dd($dizhi);
        $a=$dizhi['shop_address_name'];
        $b=$dizhi['shop_address_id'];
        $where=[
            ['shop_address_name','=',$a],
            ['shop_address_id','!=',$b]
        ];
        $bb = DB::table('shop_address')->where($where)->first();
        if ($bb) {
            echo json_encode(['errno' => 00001, 'msg' => '用户名已被注册']);
            exit;
        } else {
            $wheree=[
                ['shop_address_id','=',$b]
            ];
            unset($dizhi['shop_address_id']);
            $cc = DB::table('shop_address')->where($wheree)->update($dizhi);
            if ($cc!==false) {
                echo json_encode(['errno' => 00000, 'msg' => '修改成功']);
            } else {
                echo json_encode(['errno' => 00001, 'msg' => '修改失败']);
                exit;
            }
        }
    }
    //删除页面
    public function dizhidel($id){
        $where=[
            ['shop_address_id', '=', $id]
        ];
//        dd($where);
        $del = Address::where($where)->delete();

        if ($del) {
            return redirect('/index/address');
        }

    }
    //修改
    public function dizhiedit($id){
        $areaa = Area::where(["pid"=>0])->get();
        $xym = DB::table('shop_address')->where("shop_address_id",$id)->first();
        //循环覆盖地址id
//        $xym=array_map('get_object_vars', $xym);

        $city = Area::where(["pid"=>$xym->shop_address_province])->get();
        $area = Area::where(["pid"=>$xym->shop_address_city])->get();
        return view('/index/dizhiedit',['xym'=>$xym,'areaa'=>$areaa,'city'=>$city,'area'=>$area]);
    }
}