<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Code;
class Phone extends Model
{
    /**
     * @param $phone
     * @return bool
     * 发送验证码
     */
    public function send_code($phone)
    {
        $host = "http://yzxyzm.market.alicloudapi.com";
        $path = "/yzx/verifySms";
        $method = "POST";
        $appcode = "b020e3180a084550bfe3531a5e2610f9";
        $headers = array();
        $code = rand(100000, 999999);
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "phone=$phone&templateId=TP18040314&variable=code:" . $code;
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        if (1 == strpos("$" . $host, "https://")) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
//        $re = (curl_exec($curl));
////        var_dump($re);die;
//        $re = json_decode($re, true);
        $re = [
            'return_code' => 00000
        ];
        if ($re['return_code'] == 00000) {
            $code_model = new Code();
            $data = [
                'phone' => $phone,
                'code' => $code,
                'addtime' => time()
            ];
            $res = $code_model->insert($data);
            if ($res) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
