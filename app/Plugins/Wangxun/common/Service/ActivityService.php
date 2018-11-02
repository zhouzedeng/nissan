<?php

namespace Wangxun\Common\Service;

use Wangxun\Common\Model\Activity;

class ActivityService
{
    public static function getList($data = [])
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());

        // 查询数据
        $param = [];
        $order = array('id' , 'desc');
        $user_list = Activity::getListByParam($param, $data['page'], $data['limit'], null, $order);
        $total = Activity::getCntByParam($param);

        // return
        $result['data'] = $user_list;
        $result['count'] = $total;
        return $result;
    }

    /**
     * @param array $params
     * @return array
     */
    public static function save($params = array())
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());
        $userInfo = session('user_info');
        $data = [
            'theme' => $params['name'],
            'brand' => $params['brand'],
            'desc'  => $params['desc'],
            'bg_img_url' => $params['img'],
            'seller_id' => $userInfo->seller->sellerId,
            'check_status' => 0,
            'check_remark' => '',
            'created_at' => time(),
            'updated_at' => time()
        ];
        $rs = Activity::add($data);
        if (empty($rs)) {
            $result['code'] = '200001';
            $result['msg'] = '添加失败';
        }
        return $result;
    }
}
