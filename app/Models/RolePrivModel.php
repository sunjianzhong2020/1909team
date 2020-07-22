<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePrivModel extends Model
{
    protected $table="shop_role_priv";
    protected $primaryKey="id";
    public $timestamps=false;
    public $guard=[];
}
