<?php
namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
            $request->session()->put('user_info',$userInfo);
            return redirect(route('home.index'));
        } else {
            Log::info('token_api获取用户数据失败');
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
