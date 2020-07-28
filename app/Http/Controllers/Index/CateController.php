<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CateController extends Controller
{
    /**
    *分类详情
    */
    public function cateInfo($id)
    { 
    	echo $id;
    	return view('index/cate/cateInfo');
    }
}
