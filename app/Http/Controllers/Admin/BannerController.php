<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;


class BannerController extends Controller
{
        public function banneradd(){
            return view('admin/banner/banneradd');
        }

        public function bannerdo(Request $request){
            $arr = $request->all();
            dd($arr);
        }
}
