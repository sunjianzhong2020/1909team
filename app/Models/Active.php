<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Active extends Model
{
    protected  $table='shop_active';
    protected $primaryKey='a_id';
    public $timestamps=false;

}
