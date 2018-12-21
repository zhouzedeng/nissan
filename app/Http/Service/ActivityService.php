<?php
namespace App\Http\Service;

use App\Http\Model\Activity;
use App\Http\Model\ActivityGoods;

/**
 * 活动业务
 * Class ActivityService
 * @package Wangxun\Common\Service
 * @author Zed
 * @since 2018-11-1
 */
class ActivityService extends BaseService
{
    /**
     * 获取活动列表数据
     * @param array $data
     * @return array
     * @author Zed
     * @since 2018-11-1
     */
    public static function getList($data = [])
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());

        $param = [];
        $param['deleted_at'] = 0;
        $order = array('id' , 'desc');
        $list = Activity::getListByParam($param, $data['page'], $data['limit'], null, $order);
        $total = Activity::getCntByParam($param);
        foreach ($list as $k => $v) {
            $list[$k]->bg_img_url = 'https:'.env('OSS_CDN_DOMAIN').'/'.$v->bg_img_url;;
            $list[$k]->start = date("Y-m-d H:i:s", $v->start_time);
            $list[$k]->end = date("Y-m-d H:i:s", $v->end_time);
            $list[$k]->created_at = date("Y-m-d H:i:s", $v->created_at);
        }

        // return
        $result['data'] = $list;
        $result['count'] = $total;
        return $result;
    }

    /**
     * 新增活动数据
     * @param array $params
     * @return array
     * @author Zed
     * @since 2018-11-1
     */
    public static function save($params = array())
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());

        $data = [
            'theme' => $params['name'],
            'brand' => $params['brand'],
            'desc'  => $params['desc'],
            'bg_img_url' => $params['img'],
            'seller_id' => 0,
            'start_time' => strtotime($params['start_time']),
            'end_time' => strtotime($params['end_time']),
            'check_status' => 0,
            'check_remark' => '',
            'created_at' => time(),
            'updated_at' => time()
        ];
        $rs = Activity::add($data);
        if (isset($params ['goods_id'])) {
            $actGoods = [
                'activity_id' => $rs,
                'goods_id' => implode(',',array_keys($params ['goods_id'])),
            ];
            ActivityGoods::add($actGoods);
            if (empty($rs)) {
                $result['code'] = '200001';
                $result['msg'] = '添加失败';
            }
        }
        return $result;
    }

    /**
     * 删除商品数据
     * @param array $params
     * @return array
     * @author shengquan
     * @since 2018-11-1
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
     * @since 2018-11-1
     */
    public static function getFind($params = [])
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());
        // 查询数据
        $where = [];
        $where ['id'] = $params ['id'];
        $where['deleted_at'] = 0;
        $find = Activity::getOneByParam($where,'*');
        $find->storage_bg_img_url =  'https:'.env('OSS_CDN_DOMAIN').'/'.$find->bg_img_url;
        $find->end_time = date("Y-m-d H:i:s", $find->end_time);
        $find->start_time = date("Y-m-d H:i:s", $find->start_time);
        $result['data'] = $find;
        return $result;
    }

    /**
     * 修改商品数据
     * @param array $params
     * @return array
     * @author shengquan
     * @since 2018-11-1
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
            'start_time' => strtotime($params['start_time']),
            'end_time' => strtotime($params['end_time']),
            'updated_at' => time()
        ];
        $rs = Activity::updateById($data,$params['id']);
        $act_goods_info = ActivityGoods::getOneByParam(['activity_id'=>$params['id']]);
        $actGoods = [
            'activity_id' => $params['id'],
            'goods_id' => implode(',',array_keys($params ['goods_id'])),
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
