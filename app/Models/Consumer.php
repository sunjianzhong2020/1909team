<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
    protected  $table='shop_consumer';
    protected $primaryKey='con_id';
    public $timestamps=false;
}
