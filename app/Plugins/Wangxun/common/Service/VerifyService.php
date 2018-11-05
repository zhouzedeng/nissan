<?php
namespace Wangxun\Common\Service;

use Wangxun\Common\Model\Activity;
use Wangxun\Common\Model\Seller;

class VerifyService
{
    /**
     * 获取活动列表数据
     * @param array $data
     * @return array
     * @author zhouzedeng
     */
    public static function getCheckActivityList($data = [])
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());

        //get user info
        $seller_list = Seller::getListByParam([]);
        $seller_list = array_column($seller_list, 'name', 'id');

        // 查询数据
        $param = [];
        $param['deleted_at'] = 0;
        if (isset($data['check_status'])) {
            $param['check_status'] = $data['check_status'];
        }
        $order = array('id', 'desc');
        $list = Activity::getListByParam($param, $data['page'], $data['limit'], null, $order);
        $total = Activity::getCntByParam($param);
        foreach ($list as $k => $v) {
            $list[$k]->seller_name = isset($seller_list[$v->seller_id]) ? $seller_list[$v->seller_id] : '';
        }

        // return
        $result['data'] = $list;
        $result['count'] = $total;
        return $result;
    }

    /**
     * 审核
     * @return array
     */
    public static function check($params = [])
    {
        $result = array('code' => 0,  'msg' => '', 'data' => []);
        $status = isset($params['status']) ? $params['status'] : 0;
        $data = [
            'check_status' => $status,
            'updated_at' => time(),
            'check_remark' => isset($params['remark']) ? $params['remark'] : '',
        ];
        Activity::updateById($data, $params['id']);
        return $result;
    }
}
