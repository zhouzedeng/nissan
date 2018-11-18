<?php
namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Wangxun\Kanjia\Service\SellerService;


/**
 * IndexController
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    /**
     * index
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function index(Request $request)
    {
        if (!isset($_GET['token'])) {
            return redirect(config('plugin.login_page'));
        }
        $userInfo = $this->tokenApi($_GET['token']);
        if (!empty($userInfo) && isset($userInfo->user_name)) {
            $userInfo = json_decode(json_encode($userInfo), true);
            if ($userInfo) {
                SellerService::save($userInfo);
            }
            $token = $request->cookie('token');
            if (empty($token)) {
                $token = $this->getToken();
            }
            Redis::setex($token, 3600 * 2, json_encode($userInfo));
            return redirect(route('home.index'))->cookie('token', $token, 120);
        } else {
            return redirect(config('plugin.login_page'));
        }
    }

    /**
     * getToken
     * @return string
     */
    protected function getToken()
    {
        return md5(uniqid() . uniqid());
    }

    /**
     * tokenApi
     * @param $token
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function tokenApi($token)
    {
        try {
            $client = new Client();
            $api_url = config('plugin.api.open.api') . '/open/dealers/v1/api/token?token=' . $token;
            $response = $client->request('GET', $api_url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . get_plugin_open_api_access_token()
                ]
            ]);
            $body = $response->getBody();
            $stringBody = (string)$body;
            $userInfo = json_decode($stringBody);
            return $userInfo;
        } catch (RequestException $e) {
            Log::info($e->getMessage());
            return redirect(config('plugin.login_page'));
        }
    }
}
