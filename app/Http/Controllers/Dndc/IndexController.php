<?php
namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        if (!isset($_GET['token'])) {
            return redirect(config('plugin.login_page'));
        }
        $userInfo = $this->tokenApi($_GET['token']);
        if (!empty($userInfo) && isset($userInfo->user_name)) {
            Session::put('user_info',$userInfo);
        } else {
            Log::info('token_api获取用户数据失败');
            return redirect(config('plugin.login_page'));
        }
        echo '登录成功,用户信息保存session成功';
    }

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