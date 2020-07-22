<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivModel extends Model
{
    protected $table="shop_priv";
    protected $primaryKey="priv_id";
    public $timestamps=false;
    public $guard=[];
}
