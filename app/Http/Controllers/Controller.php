<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function api($status = 1 , $msg = 'fail' , $data = [])
    {
        return [
            'code' => $status,
            'message' => $msg,
            'resault' => $data
        ];
    }
}
