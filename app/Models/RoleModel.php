<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table="shop_role";
    protected $primaryKey="role_id";
    public $timestamps=false;
    public $guard=[];
}
