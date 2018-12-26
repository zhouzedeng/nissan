<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Comm\BaseController;
use EasyWeChat\Factory;
use Illuminate\Support\Facades\Log;


/**
 * Class WechatController
 * @package App\Http\Controllers\Api
 * @Author Zed
 * @Time 2018/12/26 16:31
 */
class WechatController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志
        $app = app('wechat.official_account');
        $app->server->push(function($message){
            return "欢迎关注 overtrue！";
        });

        return $app->server->serve();
    }

    /**
     * 发起微信授权
     * @Author Zed
     * @Time 2018/12/26 16:39
     */
    public function oauth2()
    {
        $app = Factory::officialAccount();
        $response = $app->oauth->scopes(['snsapi_userinfo'])->redirect();
        return $response;
    }
}

