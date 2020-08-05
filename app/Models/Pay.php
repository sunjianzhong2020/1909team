<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    protected  $table='shop_pay';
    protected $primaryKey='p_id';
    public $timestamps=false;
}
