<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static $allParams = null;

    public function __construct()
    {
        self::$allParams = array_merge($_GET, $_POST);
        self::$allParams['seller'] = session('user_info');
    }

    public function apiSuccess($msg = 'success', $data = [])
    {
        $result = [
            'code' => 0,
            'msg' => $msg,
            'data' => $data
        ];
        return $result;
    }

    public function apiFail($code, $msg = '操作失败')
    {
        $result = [
            'code' => $code,
            'msg' => $msg,
        ];
        return $result;
    }


}
