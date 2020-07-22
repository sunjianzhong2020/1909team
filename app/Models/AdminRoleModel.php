<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminRoleModel extends Model
{
    protected $table="shop_admin_role";
    protected $primaryKey="id";
    public $timestamps=false;
    public $guard=[];
}
