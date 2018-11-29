<?php
namespace Wangxun\Kanjia\Controllers;

use Illuminate\Http\Request;
use Wangxun\Kanjia\Service\UserService;
use Wangxun\Kanjia\Service\VisitorService;

/**
 * VisitorController
 * Class UserController
 * @package Wangxun\Kanjia\Controllers
 * @author Zed
 * @since 2018-11-6
 */
class VisitorController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * index
     * @author Zed
     * @since 2018-11-6
     */
    public function index()
    {
        $this->checkPermission();
        return view('wangxun.kanjia.visitor.index');
    }

    /**
     * getList
     * @author Zed
     * @since 2018-11-6
     */
    public function getList(Request $request)
    {
        $this->checkPermission();
        $this->checkPermission();
        $result = VisitorService::getList($this->params);
        return $result;
    }

    /**
     * allIndex
     * @author Zed
     * @since 2018-11-6
     */
    public function allIndex()
    {
        $this->checkPermission();
        return view('wangxun.kanjia.visitor.allIndex');
    }

    /**
     * allList
     * @author Zed
     * @since 2018-11-6
     */
    public function allList()
    {
        $this->checkPermission();
        $result = VisitorService::getAllList($this->params);
        return $result;
    }
}

