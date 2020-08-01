<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected  $table='shop_work';
    protected $primaryKey='w_id';
    public $timestamps=false;
}
