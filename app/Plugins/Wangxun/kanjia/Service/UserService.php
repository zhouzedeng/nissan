<?php
namespace Wangxun\Kanjia\Service;

use Wangxun\Kanjia\Model\User;

/**
 * UserService
 * Class UserService
 * @package Wangxun\Common\Service
 * @author Zed
 * @since 2018-11-6
 */
class UserService extends BaseService
{
    /**
     * 获取列表数据
     * @param array $data
     * @return array
     * @author Zed
     * @since 2018-11-6
     */
    public static function getList($data = [])
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());

        // 查询数据
        $userInfo = session('user_info');
        $param = [];
        $param['seller_id'] = $userInfo->store_id;
        $order = array('id' , 'desc');
        $list = User::getListByParam($param, $data['page'], $data['limit'], null, $order);
        $total = User::getCntByParam($param);
        foreach ($list as $k => $v) {
            $list[$k]->created_at = date("Y-m-d H:i:s", $v->created_at);
        }

        // return
        $result['data'] = $list;
        $result['count'] = $total;
        return $result;
    }

    /**
     * 获取列表数据
     * @param array $data
     * @return array
     * @author Zed
     * @since 2018-11-6
     */
    public static function getAllList($data = [])
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());

        // 查询数据
        $param = [];
        $order = array('id' , 'desc');
        $list = User::getListByParam($param, $data['page'], $data['limit'], null, $order);
        $total = User::getCntByParam($param);
        foreach ($list as $k => $v) {
            $list[$k]->created_at = date("Y-m-d H:i:s", $v->created_at);
        }

        // return
        $result['data'] = $list;
        $result['count'] = $total;
        return $result;
    }
}
