<?php
namespace Wangxun\Activity\Controllers;

use Wangxun\Common\Service\ThirdApiService;

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
     * 获取车系列表
     * @by zed
     * @since 2018-10-30
     */
    public function getCarSeriesInfo()
    {
        $result = ThirdApiService::getCarSeriesInfo($this->params);
        return $result;
    }

    /**
     * 获取卡券列表
     * @by zed
     * @since 2018-10-30
     */
    public function getCouponList()
    {
        $result = ThirdApiService::getCouponList($this->params);
        return $result;
    }

    /**
     * 获取卡券详情
     * @by zed
     * @since 2018-10-30
     */
    public function getCouponInfo()
    {
        $result = ThirdApiService::getCouponInfo($this->params);
        return $result;
    }

    /**
     * 发送业务短信
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @by zed
     * @since 2018-10-30
     */
    public function sendSms()
    {
        $result = ThirdApiService::sendSms($this->params);
        return $result;
    }
}

