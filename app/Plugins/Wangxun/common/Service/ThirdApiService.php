<?php
namespace Wangxun\Common\Service;

use GuzzleHttp\Client;

/**
 * 开放接口服务
 * Class ThirdApiService
 * @package Wangxun\Common\Service
 * @author Zed
 * @since 2018-11-5
 */
class ThirdApiService extends BaseService
{
    /**
     * 获取车系列表
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author Zed
     * @since 2018-11-5
     */
    public static function getCarSeriesInfo()
    {
        // 初始化
        $result = array('code' => 0, 'msg' => '', 'data' => array());

        // 获取第三方数据
        $client = new Client();
        $api_url = config('plugin.api.open.api') . '/open/v1/api/base/getCarSeriesInfo';
        $header = ['headers' => ['Authorization' => 'Bearer ' . get_plugin_open_api_access_token()]];
        $response = $client->request('GET', $api_url, $header);
        $body = $response->getBody();
        $string_body = (string)$body;
        $car_info = json_decode($string_body);
        // 数据返回
        $result['data'] = $car_info;
        return $result;
    }

    /**
     * 获取卡券列表
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author Zed
     * @since 2018-11-5
     */
    public static function getCouponList($data = array())
    {
        // 初始化
        $result = array('code' => 0, 'msg' => '', 'data' => array());

        // 参数验证
        if (empty($data['phone'])) {
            $result['code'] = 300001;
            $result['msg'] = '手机号必填';
            return $result;
        }

        // 获取第三方数据
        $client = new Client();
        $api_url = config('plugin.api.open.api') . '/open/v1/api/coupon/coupons/' . $data['phone'];
        $header = ['headers' => ['Authorization' => 'Bearer ' . get_plugin_open_api_access_token()]];
        $response = $client->request('GET', $api_url, $header);
        $body = $response->getBody();
        $string_body = (string)$body;
        $info = json_decode($string_body);

        // 数据返回
        $result['data'] = $info;
        return $result;
    }

    /**
     * 查询卡券详情
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author Zed
     * @since 2018-11-5
     */
    public static function getCouponInfo($data = array())
    {
        // 初始化
        $result = array('code' => 0, 'msg' => '', 'data' => array());

        // 参数验证
        if (empty($data['couponId'])) {
            $result['code'] = 300002;
            $result['msg'] = '卡券Id必填';
            return $result;
        }

        // 获取第三方数据
        $client = new Client();
        $api_url = config('plugin.api.open.api') . '/open/v1/api/coupon/coupon/' . $data['couponId'];
        $header = ['headers' => ['Authorization' => 'Bearer ' . get_plugin_open_api_access_token()]];
        $response = $client->request('GET', $api_url, $header);
        $body = $response->getBody();
        $string_body = (string)$body;
        $info = json_decode($string_body);

        // 数据返回
        $result['data'] = $info;
        return $result;
    }

    /**
     * 发送业务短信
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author Zed
     * @since 2018-11-5
     */
    public static function sendSms($data = array())
    {
        // 初始化
        $result = array('code' => 0, 'msg' => '', 'data' => array());

        // 参数验证
        if (empty($data['mobile']) || empty($data['card_name']) || empty($data['card_code'])) {
            $result['code'] = 300003;
            $result['msg'] = '参数不完整，请重试';
            return $result;
        }

        // 获取第三方数据
        $client = new Client();
        $query = 'channel=2&template_code=SMS_145656541&client_ip=' . $_SERVER['REMOTE_ADDR'] . "&mobile=" . $data['mobile'] . "&card_name=" . $data['card_name'] . "&card_code" . $data['card_code'];
        $api_url = config('plugin.api.open.api') . '/open/v1/api/sms/sendmess?' . $query;
        $header = ['headers' => ['Authorization' => 'Bearer ' . get_plugin_open_api_access_token()]];
        $response = $client->request('GET', $api_url, $header);
        $body = $response->getBody();
        $string_body = (string)$body;
        $info = json_decode($string_body);

        // 数据返回
        $result['data'] = $info;
        return $result;
    }
}
