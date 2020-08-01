<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected  $table='shop_cate';
    protected $primaryKey='c_id';
    public $timestamps=false;

    public static function createTree($data,$pid=0,$level=0)
    {
        if(!$data || !is_array($data)){
            return;
        }
        static $arr=[];
        foreach($data as $k=>$v){
            if($v['p_id']==$pid){
                $v['level']=$level;
                $arr[]=$v;
                self::createTree($data,$v['c_id'],$level+1);
            }
        }
        return $arr;
    }
}
