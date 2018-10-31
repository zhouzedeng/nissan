<?php

namespace Wangxun\Activity\Controllers;

use App\Http\Controllers\Controller;
use Wangxun\Common\Service\ActivityService;
use Wangxun\Common\Service\QuestionService;

/**
 * 活动控制器
 * Class UserController
 * @package App\Http\Controllers
 */
class ActivityController extends Controller
{
    /**
     * 列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('wangxun.activity.index');
    }

    /**
     * 添加页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('wangxun.activity.add');
    }

    /**
     * 获取用户列表数据
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList()
    {
        // 业务处理
        $result = ActivityService::getList(self::$allParams);

        // 返回数据
        return $result;
    }
}

