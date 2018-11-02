<?php
namespace Wangxun\Activity\Controllers;

use App\Http\Controllers\Controller;
use Wangxun\Common\Service\ActivityService;

/**
 * 活动控制器
 * Class UserController
 * @package App\Http\Controllers
 */
class ActivityController extends Controller
{
    /**
     * 列表页
     */
    public function index()
    {
        return view('wangxun.activity.index');
    }

    /**
     * 添加页
     */
    public function add()
    {
        return view('wangxun.activity.add');
    }

    /**
     * 获取活动接口
     */
    public function getList()
    {
        $result = ActivityService::getList(self::$allParams);
        return $result;
    }

    /**
     * 新增活动接口
     */
    public function save()
    {
        $params = self::$allParams;
        if (empty($params['name'])) {
            return $this->apiFail('100001', '主题必填');
        }
        if (empty($params['brand'])) {
            return $this->apiFail('100002', '品牌必填');
        }
        if (empty($params['desc'])) {
            return $this->apiFail('100003', '活动描述必填');
        }
        if (empty($params['img'])) {
            return $this->apiFail('100003', '图片过大或活动背景图还没传');
        }

        $result = ActivityService::save($params);
        return $result;
    }
}

