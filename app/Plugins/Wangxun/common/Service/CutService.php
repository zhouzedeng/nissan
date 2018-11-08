<?php
namespace Wangxun\Common\Service;

use Wangxun\Common\Model\Activity;
use Wangxun\Common\Model\Cut;
use Wangxun\Common\Model\Goods;
use Wangxun\Common\Model\User;

/**
 * CutService
 * Class CutService
 * @package Wangxun\Common\Service
 * @author Zed
 * @since 2018-11-6
 */
class CutService extends BaseService
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

        // 获取经销商下的所有有效活动ID
        $param = [];
        $param['seller_id'] = $data['seller']['seller']['sellerId'];
        $param['deleted_at'] = 0;
        $activity_list = Activity::getListByParam($param);
        $activity_list = json_decode(json_encode($activity_list), true);
        $activity_id_list = array_column($activity_list, 'id');

        // 查询数据
        $param = ['activity_id', $activity_id_list];
        $order = array('id' , 'desc');
        $list = Cut::getListByParamIn([], $param, $data['page'], $data['limit'], null, $order);
        $total = Cut::getCntByParamIn([],$param);

        // 数据格式化处理
        $list = json_decode(json_encode($list), true);
        $activity_id_list = array_column($list, 'activity_id');
        $goods_id_list = array_column($list, 'goods_id');
        $user_id_list = array_column($list, 'user_id');

        // 活动列表
        $param = ['id', $activity_id_list];
        $activity_list = Activity::getListByParamIn([], $param);
        $activity_list = json_decode(json_encode($activity_list), true);
        $activity_id_val = [];
        foreach ($activity_list as $v) {
            $activity_id_val[$v['id']] = $v;
        }

        // 商品列表
        $param = ['id', $goods_id_list];
        $goods_list = Goods::getListByParamIn([], $param);
        $goods_list = json_decode(json_encode($goods_list), true);
        $goods_id_val = [];
        foreach ($goods_list as $v) {
            $goods_id_val[$v['id']] = $v;
        }

        // 用户列表
        $param = ['id', $user_id_list];
        $user_list = User::getListByParamIn([], $param);
        $user_list = json_decode(json_encode($user_list), true);
        $user_id_val = [];
        foreach ($user_list as $v) {
            $user_id_val[$v['id']] = $v;
        }

        foreach ($list as $k => $v) {
            $list[$k]['activity_name'] = isset($activity_id_val[$v['activity_id']]) ? $activity_id_val[$v['activity_id']]['theme'] : '';
            $list[$k]['goods_name'] = isset($goods_id_val[$v['goods_id']]) ? $goods_id_val[$v['goods_id']]['goods_name'] : '';
            $list[$k]['need_cut_num'] = isset($goods_id_val[$v['goods_id']]) ? $goods_id_val[$v['goods_id']]['need_cut_num'] : '';
            $list[$k]['user_name'] = isset($user_id_val[$v['user_id']]) ? $user_id_val[$v['user_id']]['name'] : '';
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
        $list = Cut::getListByParam($param, $data['page'], $data['limit'], null, $order);
        $total = Cut::getCntByParam($param);

        // 数据格式化处理
        $list = json_decode(json_encode($list), true);
        $activity_id_list = array_column($list, 'activity_id');
        $goods_id_list = array_column($list, 'goods_id');
        $user_id_list = array_column($list, 'user_id');

        // 活动列表
        $param = ['id', $activity_id_list];
        $activity_list = Activity::getListByParamIn([], $param);
        $activity_list = json_decode(json_encode($activity_list), true);
        $activity_id_val = [];
        foreach ($activity_list as $v) {
            $activity_id_val[$v['id']] = $v;
        }

        // 商品列表
        $param = ['id', $goods_id_list];
        $goods_list = Goods::getListByParamIn([], $param);
        $goods_list = json_decode(json_encode($goods_list), true);
        $goods_id_val = [];
        foreach ($goods_list as $v) {
            $goods_id_val[$v['id']] = $v;
        }

        // 用户列表
        $param = ['id', $user_id_list];
        $user_list = User::getListByParamIn([], $param);
        $user_list = json_decode(json_encode($user_list), true);
        $user_id_val = [];
        foreach ($user_list as $v) {
            $user_id_val[$v['id']] = $v;
        }

        foreach ($list as $k => $v) {
            $list[$k]['activity_name'] = isset($activity_id_val[$v['activity_id']]) ? $activity_id_val[$v['activity_id']]['theme'] : '';
            $list[$k]['goods_name'] = isset($goods_id_val[$v['goods_id']]) ? $goods_id_val[$v['goods_id']]['goods_name'] : '';
            $list[$k]['need_cut_num'] = isset($goods_id_val[$v['goods_id']]) ? $goods_id_val[$v['goods_id']]['need_cut_num'] : '';
            $list[$k]['user_name'] = isset($user_id_val[$v['user_id']]) ? $user_id_val[$v['user_id']]['name'] : '';
        }



        // return
        $result['data'] = $list;
        $result['count'] = $total;
        return $result;
    }
}
