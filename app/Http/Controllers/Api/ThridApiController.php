<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Comm\BaseController;
use App\Http\Service\ThirdApiService;

/**
 * 第三方接口
 * Class UserController
 * @package App\Http\Controllers
 * @by zed
 * @since 2018-10-30
 */
class ThridApiController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 获取众号分享链接信息
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @by quan
     * @since 2018-11-29
     */
    public function shaerInfo()
    {
        $result = ThirdApiService::shaerInfo($this->params);
        return $result;
    }
}

