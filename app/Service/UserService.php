<?php

namespace App\Service;

use App\Model\Users;

class UserService
{
    public static function getUserList($data = [])
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());

        // 查询数据
        $param = [];
        isset($data['name']) && $param[] = ['name', 'like', "%" . $data['name'] . "%"];
        isset($data['id']) && $param[] = ['id', '=', $data['uid']];
        $order = array('id' , 'desc');
        $user_list = Users::getListByParam($param, $data['page'], $data['limit'], null, $order);
        $total = Users::getCntByParam($param);

        // return
        $result['data'] = $user_list;
        $result['count'] = $total;
        return $result;
    }
}
