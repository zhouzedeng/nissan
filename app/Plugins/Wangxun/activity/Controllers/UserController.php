<?php
namespace Wangxun\Activity\Controllers;

use Wangxun\Common\Service\UserService;

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
        return view('wangxun.user.index');
    }

    /**
     * 获取经销商用户列表数据
     * @author Zed
     * @since 2018-11-6
     */
    public function getList()
    {
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
        return view('wangxun.user.allIndex');
    }

    /**
     * 获取全部用户数据
     * @author Zed
     * @since 2018-11-6
     */
    public function allList()
    {
        $result = UserService::getAllList($this->params);
        return $result;
    }

}

