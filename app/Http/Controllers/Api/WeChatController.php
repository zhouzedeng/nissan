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
class WeChatController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \EasyWeChat\Kernel\Exceptions\BadRequestException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \ReflectionException
     * @Author Zed
     * @Time 2018/12/26 17:33
     */
    public function serve()
    {
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
        $app = Factory::officialAccount([]);
        $response = $app->oauth->scopes(['snsapi_userinfo'])->redirect();
        return $response;
    }
}

