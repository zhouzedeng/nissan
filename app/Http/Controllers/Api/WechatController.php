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
class WechatController extends BaseController
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
        $app = Factory::officialAccount();
        $response = $app->oauth->scopes(['snsapi_userinfo'])->redirect();
        return $response;
    }
}

