<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Comm\BaseController;

/**
 * 首页控制器
 * Class HomeController
 * @package Wangxun\Activity\Controllers
 * @author Zed
 * @since 2018-11-1
 */
class HomeController extends BaseController
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @Author Zed
     * @Time 2018/12/20 18:30
     */
    public function index()
    {
        var_dump(555);
        return view('home.index');
    }
}

