<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected  $table='shop_banner';
    protected $primaryKey='b_id';
    public $timestamps=false;
}
