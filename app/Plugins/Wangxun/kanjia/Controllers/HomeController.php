<?php
namespace Wangxun\Kanjia\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Wangxun\Kanjia\Service\SellerService;

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


    public function index()
    {
        return view('wangxun.kanjia.home.index');
    }

    /**
     * getToken
     * @return string
     */
    protected function getToken()
    {
        return md5(uniqid() . uniqid());
    }
}

