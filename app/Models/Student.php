<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected  $table='student';
    protected $primaryKey='s_id';
    public $timestamps=false;
}
