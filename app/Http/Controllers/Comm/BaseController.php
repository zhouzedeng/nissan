<?php
namespace App\Http\Controllers\Comm;

use Exception;
use App\Http\Controllers\Controller;

/**
 * 控制器基类
 * Class BaseController
 * @package Wangxun\Activity\Controllers
 * @author Zed
 * @since 2018-11-1
 */
class BaseController extends Controller
{
    public $params = null;

    public function __construct()
    {
        parent::__construct();
        $this->params = array_merge($_GET, $_POST);
    }
}

