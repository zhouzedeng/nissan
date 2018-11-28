<?php
namespace Wangxun\Kanjia\Controllers;

use Wangxun\Kanjia\Service\VerifyService;

/**
 * 活动控制器
 * Class UserController
 * @package App\Http\Controllers
 * @author Zed
 * @since 2018-11-3
 */
class VerifyController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 列表页
     * @author Zed
     * @since 2018-11-3
     */
    public function index()
    {
        return view('wangxun.kanjia.verify.index');
    }

    /**
     * 获取活动接口
     * @author Zed
     * @since 2018-11-3
     */
    public function getList()
    {
        $result = VerifyService::getCheckActivityList($this->params);
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
        $result = VerifyService::check($this->params);
        return $result;
    }
}

