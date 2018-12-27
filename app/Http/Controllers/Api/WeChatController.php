<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Comm\BaseController;
use EasyWeChat\Factory;


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
     * 发起微信授权
     * @Author Zed
     * @Time 2018/12/26 16:39
     */
    public function oauth2()
    {
        $app = Factory::officialAccount(config('wechat.official_account.default'));
        $response = $app->oauth->scopes(['snsapi_userinfo'])->redirect();
        return $response;
    }


    public function wxCallBack()
    {
        $app = Factory::officialAccount(config('wechat.official_account.default'));
        $user = $app->oauth->user();
        return $user->getAvatar();;
    }

    public function jssdkConfig()
    {
        $app = Factory::officialAccount(config('wechat.official_account.default'));
        $config = $app->jssdk->setUrl('http://w.d.com/index.html')->buildConfig(array('onMenuShareQQ', 'onMenuShareWeibo'), true);
        return $config;
    }
}

