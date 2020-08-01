<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected  $table='shop_address';
    protected $primaryKey='shop_address_id';
    public $timestamps=false;

}
