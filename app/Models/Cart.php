<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected  $table='shop_cart';
    protected $primaryKey='cart_id';
    public $timestamps=false;
}
