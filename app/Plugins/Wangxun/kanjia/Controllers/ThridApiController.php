<?php
namespace Wangxun\Kanjia\Controllers;

use Wangxun\Kanjia\Service\SeriesService;
use Wangxun\Kanjia\Service\ThirdApiService;

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
        SeriesService::save($result['data']);
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
        $this->checkPermission();
        $result = ThirdApiService::sendSms($this->params);
        return $result;
    }
    /**
     * 发送手机验证码api
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @by quan
     * @since 2018-11-8
     */
    public function sendSmsCode()
    {
        $result = ThirdApiService::sendSmsCode($this->params);
        return $result;
    }

    /**
     * 获取东风日产公众号分享链接信息
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

