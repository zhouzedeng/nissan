<?php

namespace Wangxun\Common\Service;

use Wangxun\Common\Model\Activity;
use Wangxun\Common\Model\ActivityGoods;

/**
 * 活动业务
 * Class ActivityService
 * @package Wangxun\Common\Service
 * @author zhouzedeng
 */
class ActivityService
{
    /**
     * 获取活动列表数据
     * @param array $data
     * @return array
     * @author zhouzedeng
     */
    public static function getList($data = [])
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());

        // 查询数据
        $userInfo = session('user_info');
        $param = [];
        $param['seller_id'] = $userInfo->seller->sellerId;
        $param['deleted_at'] = 0;
        $order = array('id' , 'desc');
        $user_list = Activity::getListByParam($param, $data['page'], $data['limit'], null, $order);
        $total = Activity::getCntByParam($param);

        // return
        $result['data'] = $user_list;
        $result['count'] = $total;
        return $result;
    }

    /**
     * 新增活动数据
     * @param array $params
     * @return array
     * @author zhouzedeng
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
        $actGoods = [
            'wangxun_activity_id' => $rs,
            'goods_id' => implode(',',array_keys($params ['goods_id'])),
            'need_cut_num'=>1
        ];
        ActivityGoods::add($actGoods);
        if (empty($rs)) {
            $result['code'] = '200001';
            $result['msg'] = '添加失败';
        }
        return $result;
    }

    /**
     * 删除商品数据
     * @param array $params
     * @return array
     * @author shengquan
     */
    public static function del($params = array())
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());
        $data ['deleted_at'] = time();
        $rs = Activity::updateById($data,$params['id']);
        if (empty($rs)) {
            $result['code'] = '100001';
            $result['msg'] = '删除失败';
        }
        return $result;
    }

    /**
     * 获取一条商品数据
     * @param array $data
     * @return array
     * @author shengquan
     */
    public static function getFind($where = [])
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());
        // 查询数据
        $userInfo = session('user_info');
        $where['seller_id'] = $userInfo->seller->sellerId;
        $where['deleted_at'] = 0;
        $find = Activity::getOneByParam($where,'*');
        $find->storage_bg_img_url = '/storage/'.$find->bg_img_url;
        $result['data'] = $find;
        return $result;
    }

    /**
     * 修改商品数据
     * @param array $params
     * @return array
     * @author shengquan
     */
    public static function updata_goods($params = array())
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());
        $data = [
            'theme' => $params['name'],
            'brand' => $params['brand'],
            'desc'  => $params['desc'],
            'bg_img_url' => $params['img'],
            'check_status' => 0,
            'updated_at' => time()
        ];
        $rs = Activity::updateById($data,$params['id']);
        $act_goods_info = ActivityGoods::getOneByParam(['wangxun_activity_id'=>$params['id']]);
        $actGoods = [
            'wangxun_activity_id' => $params['id'],
            'goods_id' => implode(',',array_keys($params ['goods_id'])),
            'need_cut_num'=>1
        ];
        if($act_goods_info){
            ActivityGoods::updateById($actGoods,$act_goods_info->id);
        }else{
            ActivityGoods::add($actGoods);
        }
        if (empty($rs)) {
            $result['code'] = '100004';
            $result['msg'] = '修改失败';
        }
        return $result;
    }
}
