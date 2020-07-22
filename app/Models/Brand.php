<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected  $table='shop_brand';
    protected $primaryKey='b_id';
    public $timestamps=false;
}
