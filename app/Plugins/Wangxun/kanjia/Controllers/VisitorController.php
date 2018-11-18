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

