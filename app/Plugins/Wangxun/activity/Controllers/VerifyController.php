<?php
namespace Wangxun\Activity\Controllers;

use App\Http\Controllers\Controller;
use Wangxun\Common\Service\VerifyService;

/**
 * 活动控制器
 * Class UserController
 * @package App\Http\Controllers
 * @author Zed
 * @since 2018-11-3
 */
class VerifyController extends Controller
{
    /**
     * 列表页
     * @author Zed
     * @since 2018-11-3
     */
    public function index()
    {
        return view('wangxun.verify.index');
    }

    /**
     * 获取活动接口
     * @author Zed
     * @since 2018-11-3
     */
    public function getList()
    {
        $result = VerifyService::getCheckActivityList(self::$allParams);
        return $result;
    }

    /**
     * 审核
     * @return array
     * @author Zed
     * @since 2018-11-3
     */
    public function check()
    {
        $result = VerifyService::check(self::$allParams);
        return $result;
    }
}

