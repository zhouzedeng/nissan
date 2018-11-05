<?php
namespace Wangxun\Activity\Controllers;

use App\Http\Controllers\Controller;
use Wangxun\Common\Service\VerifyService;

/**
 * 活动控制器
 * Class UserController
 * @package App\Http\Controllers
 */
class VerifyController extends Controller
{
    /**
     * 列表页
     */
    public function index()
    {
        return view('wangxun.verify.index');
    }

    /**
     * 获取活动接口
     */
    public function getList()
    {
        $result = VerifyService::getCheckActivityList(self::$allParams);
        return $result;
    }

    /**
     * 审核
     * @return array
     */
    public function check()
    {
        $result = VerifyService::check(self::$allParams);
        return $result;
    }
}

