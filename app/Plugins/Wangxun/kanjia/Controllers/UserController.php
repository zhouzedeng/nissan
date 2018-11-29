<?php
namespace Wangxun\Kanjia\Controllers;

use Illuminate\Http\Request;
use Wangxun\Kanjia\Service\UserService;

/**
 * UserController
 * Class UserController
 * @package Wangxun\Activity\Controllers
 * @author Zed
 * @since 2018-11-6
 */
class UserController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * 经销商用户列表页
     * @author Zed
     * @since 2018-11-6
     */
    public function index()
    {
        $this->checkPermission();
        return view('wangxun.kanjia.user.index');
    }

    /**
     * 获取经销商用户列表数据
     * @author Zed
     * @since 2018-11-6
     */
    public function getList(Request $request)
    {
        $this->checkPermission();
        $result = UserService::getList($this->params);
        return $result;
    }

    /**
     * 全部用户列表页
     * @author Zed
     * @since 2018-11-6
     */
    public function allIndex()
    {
        $this->checkPermission();
        return view('wangxun.kanjia.user.allIndex');
    }

    /**
     * 获取全部用户数据
     * @author Zed
     * @since 2018-11-6
     */
    public function allList()
    {
        $this->checkPermission();
        $result = UserService::getAllList($this->params);
        return $result;
    }

}

