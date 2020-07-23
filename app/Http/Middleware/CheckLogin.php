<?php

namespace App\Http\Middleware;

use App\Models\AdminRoleModel;
use App\Models\PrivModel;
use App\Models\RolePrivModel;
use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       $admin_id=request()->session()->get('admin_id');
        if(!$admin_id){
            echo "<script>alert('请登录');location.href='/user/login';</script>";
        }else{
            //根据用户id 查询角色ID
            $admin_role_model=new AdminRoleModel();
            $role_data=$admin_role_model::where('admin_id',$admin_id)->get();
            foreach($role_data as $k=>$v){
                 //根据角色id查询橘色权限表
                $role_priv_model=new RolePrivModel();
                $priv=$role_priv_model::where('role_id','=',$v->role_id)->get();
                foreach($priv as $kk=>$vv){
                    //根据权限id  查询 权限表  获取权限名称
                    $priv_model=new PrivModel();
//                    var_dump($vv['priv_id']);die;
                    $priv_data=$priv_model::where('priv_id','=',$vv->priv_id)->first();
                    //权限路由
                    if($priv_data){
                        $url[]=$priv_data->priv_url;
                    }
                }

            }
            //权限路由去重
            $priv_url=array_unique($url);
            //获取当前访问的路由
            $con_url=request()->path();

           //判断当前数组是否在权限路由中
            if(!in_array($con_url,$priv_url)){
                echo "<script>alert('对不起 您不是超级管理员 没有管理员权限');window.history.go(-1);</script>";die;
            }
        }
        return $next($request);
    }
}
