<?php
namespace Wangxun\Kanjia\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Wangxun\Kanjia\Service\SellerService;


/**
 * 控制器基类
 * Class BaseController
 * @package Wangxun\Activity\Controllers
 * @author Zed
 * @since 2018-11-1
 */
class BaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function checkPermission()
    {
        $seller = session('user_info');
        if (empty($seller)) {
            return redirect(config('plugin.login_page'))->send();
        }

        SellerService::save();
    }

    /**
     * api操作成功
     * @param string $msg
     * @param array $data
     * @return array
     */
    public function apiSuccess($msg = 'success', $data = [])
    {
        $result = [
            'code' => 0,
            'msg' => $msg,
            'data' => $data
        ];
        return $result;
    }

    /**
     * api操作失败
     * @param $code
     * @param string $msg
     * @return array
     */
    public function apiFail($code, $msg = '操作失败')
    {
        $result = [
            'code' => $code,
            'msg' => $msg,
        ];
        return $result;
    }
}

