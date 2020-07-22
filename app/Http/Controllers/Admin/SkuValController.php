<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkuValController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 商品属性值添加
     */
    public function SkuValAdd()
    {
        return view('admin/SkuVal/SkuValAdd');
    }
}
