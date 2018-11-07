<?php
namespace Wangxun\Activity\Controllers;

use Illuminate\Http\Request;

/**
 * 首页控制器
 * Class HomeController
 * @package Wangxun\Activity\Controllers
 * @author Zed
 * @since 2018-11-1
 */
class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index(Request  $request)
    {
        echo $request->cookie('token');
        return view('wangxun.home.index');
    }
}

