<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table="shop_admin";
    protected $primaryKey="admin_id";
    public $timestamps=false;
    public $guard=[];
}
