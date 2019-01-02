<?php
namespace App\Http\Service;

use App\Http\Model\Admin;

class AdminService extends BaseService
{
    public static function checkLogin($data = [])
    {
        $username = $data['username'];
        $passwd = $data['passwd'];

        $param = [];
        $param['username'] = $username;
        $admin = Admin::getOneByParam($param);
            !$admin && apiFail('100002', '没有该用户名');

            if (md5(md5($passwd)) != $admin->passwd) {
                apiFail('100002', '请输入正确的密码');
        }
        request()->session()->put('uid', $admin->id);
        request()->session()->put('username', $admin->username);
    }

}
