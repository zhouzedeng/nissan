<?php
namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{

    public function getCouponList(Request $request)
    {
        $result = ['code' => 0, 'msg' => '', 'data' => []];

        $tel = isset($_GET['tel']) ? $_GET['tel'] : '';
        if (empty($tel)) {
            $result['code'] = '1001';
            $result['ms'] = '手机号不能为空';
        }
        $couponList = $this->getCouponListByTel($tel);
        return json_encode($couponList);

    }

    protected function getCouponListByTel($tel)
    {
        $client = new Client();
        $api_url = config('plugin.api.open.api') . '/open/v1/api/coupon/coupon/415286';
        $response = $client->request('GET', $api_url, [
            'headers' => [
                'Authorization' => 'Bearer ' . get_plugin_open_api_access_token()
            ]
        ]);
        $body = $response->getBody();
        $stringBody = (string)$body;
        $userInfo = json_decode($stringBody);
        return $userInfo;
    }
}