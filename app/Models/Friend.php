<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{

    protected  $table='shop_friend';
    protected $primaryKey='f_id';
    public $timestamps=false;
}
