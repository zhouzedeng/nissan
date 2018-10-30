<?php

namespace Wangxun\Activity\Controllers;

use App\Http\Controllers\Controller;
use Wangxun\Common\Service\QuestionService;

/**
 * 问题控制器
 * Class UserController
 * @package App\Http\Controllers
 */
class QuestionController extends Controller
{
    /**
     * 列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('wangxun.question.index');
    }

    /**
     * 添加页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('wangxun.question.add');
    }

    /**
     * 获取用户列表数据
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList()
    {
        // 业务处理
        $result = QuestionService::getQuestionList(self::$allParams);

        // 返回数据
        return $result;
    }
}

