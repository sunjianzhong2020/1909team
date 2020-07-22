<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkuName extends Model
{
    protected  $table='shop_sku_name';
    protected $primaryKey='sku_name_id';
    public $timestamps=false;
}
