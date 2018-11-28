<?php
namespace Wangxun\Kanjia\Controllers;

use Illuminate\Http\Request;
use Wangxun\Kanjia\Service\VisitorService;

/**
 * CountController
 * Class CountController
 * @package Wangxun\Activity\Controllers
 * @author Zed
 * @since 2018-11-6
 */
class CountController extends BaseController
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
        return view('wangxun.kanjia.count.index');
    }

    /**
     * getList
     * @author Zed
     * @since 2018-11-6
     */
    public function getList()
    {
        $this->checkPermission();
        $result = VisitorService::getList($this->params);
        return $result;
    }
}

