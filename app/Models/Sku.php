<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    protected  $table='shop_sku';
    protected $primaryKey='sku_id';
    public $timestamps=false;
}
