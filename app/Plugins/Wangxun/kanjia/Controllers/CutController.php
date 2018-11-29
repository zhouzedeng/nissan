<?php
namespace Wangxun\Kanjia\Controllers;

use Illuminate\Http\Request;
use Wangxun\Kanjia\Service\CutService;

/**
 * CutController
 * Class CutController
 * @package Wangxun\Activity\Controllers
 * @author Zed
 * @since 2018-11-6
 */
class CutController extends BaseController
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
        return view('wangxun.kanjia.cut.index');
    }

    /**
     * 获取经销商砍价列表数据
     * @author Zed
     * @since 2018-11-6
     */
    public function getList()
    {
        $this->checkPermission();
        $result = CutService::getList($this->params);
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
        return view('wangxun.kanjia.cut.allIndex');
    }

    /**
     * 获取全部用户数据
     * @author Zed
     * @since 2018-11-6
     */
    public function allList()
    {
        $this->checkPermission();
        $result = CutService::getAllList($this->params);
        return $result;
    }

}

