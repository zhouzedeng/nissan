<?php

namespace Wangxun\Activity\Controllers;

use App\Http\Controllers\Controller;
use Wangxun\Common\Service\ThirdApiService;

/**
 * 第三方接口
 * Class UserController
 * @package App\Http\Controllers
 * @by zed
 * @since 2018-10-30
 */
class ThridApiController extends Controller
{
    /**
     * 获取车系列表
     * @by zed
     * @since 2018-10-30
     */
    public function getCarSeriesInfo()
    {
        $result = ThirdApiService::getCarSeriesInfo(self::$allParams);
        return $result;
    }

    /**
     * 获取卡券列表
     * @by zed
     * @since 2018-10-30
     */
    public static function getCouponList()
    {
        $result = ThirdApiService::getCouponList(self::$allParams);
        return $result;
    }

    /**
     * 获取卡券详情
     * @by zed
     * @since 2018-10-30
     */
    public static function getCouponInfo()
    {
        $result = ThirdApiService::getCouponInfo(self::$allParams);
        return $result;
    }

    /**
     * 发送业务短信
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @by zed
     * @since 2018-10-30
     */
    public static function sendSms()
    {
        $result = ThirdApiService::sendSms(self::$allParams);
        return $result;
    }
}

