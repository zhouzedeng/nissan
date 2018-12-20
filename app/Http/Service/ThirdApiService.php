<?php
namespace App\Http\Service;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;

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
     * get
     * @param array $data
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @Author Zed
     * @Time 2018/12/20 18:43
     */
    public static function get($data = array())
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
        $header = ['headers' => ['Authorization' => 'Bearer ' . time()]];
        $response = $client->request('GET', $api_url, $header);
        $body = $response->getBody();
        $string_body = (string)$body;
        $info = json_decode($string_body);

        // 数据返回
        $result['data'] = $info;
        return $result;
    }

    /**
     * post
     * @param array $data
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @Author Zed
     * @Time 2018/12/20 18:43
     */
    public static function post($data = array())
    {
        // 初始化
        $result = array('code' => 0, 'msg' => '', 'data' => array());
        // 获取第三方数据
        $client = new Client();
        $body = [
            'user_name' => $data['name'],
            'phone' => $data['phone'],
            'ip' => $_SERVER['REMOTE_ADDR'],
        ];
        $api_url = config('plugin.api.open.api') . '/open/v1/api/clue';
        $header = ['headers' => ['Authorization' => 'Bearer ' . time()], 'json' => $body];
        $response = $client->request('POST', $api_url, $header);
        $body = $response->getBody();
        $string_body = (string)$body;
        $info = json_decode($string_body);
        // 数据返回
        $result['data'] = $info;
        return $result;
    }
}
