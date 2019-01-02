<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Comm\BaseController;
use App\Http\Service\AdminService;

/**
 * 登录控制器
 * Class LoginController
 * @package App\Http\Controllers\Admin
 * @Author Zed
 * @Time 2019/1/2 9:39
 */
class LoginController extends BaseController
{
    /**
     * 验证登录
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @Author Zed
     * @Time 2018/12/29 15:31
     */
    public function checkLogin()
    {
        $params = $this->params;
        empty($params['username']) && apiFail('100002', '用户名不能为空');
        empty($params['passwd']) && apiFail('100002','密码不能为空');
        AdminService::checkLogin($params);
        return apiSuccess();
    }

    /**
     * 登录页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     * @Author Zed
     * @Time 2018/12/29 15:31
     */
    public function login()
    {
        if (session('uid')) {
            return redirect(route('home.index'));
        }
        return view('login.login');
    }

    /**
     * 退出登录
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     * @Author Zed
     * @Time 2018/12/29 15:31
     */
    public function logout()
    {
        request()->session()->put('uid', null);
        return redirect(route('home.index'));
    }
}

