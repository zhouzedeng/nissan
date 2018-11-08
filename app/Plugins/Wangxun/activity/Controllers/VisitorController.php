<?php
namespace Wangxun\Activity\Controllers;

use Illuminate\Http\Request;
use Wangxun\Common\Service\UserService;
use Wangxun\Common\Service\VisitorService;

/**
 * VisitorController
 * Class UserController
 * @package Wangxun\Activity\Controllers
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
        return view('wangxun.visitor.index');
    }

    /**
     * getList
     * @author Zed
     * @since 2018-11-6
     */
    public function getList(Request $request)
    {
        $this->setSellerToParams($request);
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
        return view('wangxun.visitor.allIndex');
    }

    /**
     * allList
     * @author Zed
     * @since 2018-11-6
     */
    public function allList()
    {
        $result = VisitorService::getAllList($this->params);
        return $result;
    }
}

