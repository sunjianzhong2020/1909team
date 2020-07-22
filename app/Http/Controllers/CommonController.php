<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function apiOutPut($status = 1 , $msg = 'fail' , $data = [])
    {
        return [
            'code' => $status,
            'message' => $msg,
            'resault' => $data
        ];
    }
}
