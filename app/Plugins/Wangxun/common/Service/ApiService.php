<?php

namespace Wangxun\Common\Service;

use Wangxun\Common\Model\Activity;
use Wangxun\Common\Model\ActivityGoods;
use Wangxun\Common\Model\Cut;
use Wangxun\Common\Model\CutVisitor;
use Wangxun\Common\Model\Goods;
use Wangxun\Common\Model\Seller;
use Wangxun\Common\Model\User;
use Wangxun\Common\Model\Visitor;
use Illuminate\Support\Facades\DB;

/**
 * ApiService
 * Class ApiService
 * @package Wangxun\Common\Service
 * @author shengquan
 * @since 2018-11-7
 */
class ApiService
{
    /**
     * 添加用户数据
     * @param array $param
     * @return array
     * @author quan
     * @since 2018-11-7
     */
    public static function addUser($param = [])
    {
        $result = array('code' => 0, 'msg' => '', 'data' => array());
        $username = $param['username'];
        $phone = $param['phone'];
        $code = $param['code'];
        $seller_id = $param['seller_id'];
        if (empty($username)) {
            $result = array('code' => 100001, 'msg' => '姓名不能为空', 'data' => array());
            return $result;
        }
        if (empty($phone)) {
            $result = array('code' => 100002, 'msg' => '手机号不能为空', 'data' => array());
            return $result;
        }
        if (empty($code)) {
            $result = array('code' => 100003, 'msg' => '验证码不能为空', 'data' => array());
            return $result;
        }

        $data = array(
            'name' => $username,
            'phone' => $phone,
            'seller_id' => $seller_id,
            'created_at' => time(),
            'updated_at' => time(),
        );
        $seller_info = Seller::getOneByParam(['id' => $seller_id]);
        if ($seller_info) {
            $data['seller_name'] = $seller_info->name;
        }
        $row = User::add($data);

        if ($row) {
            $result ['data'] ['userid'] = $row;
            $result ['data'] ['token'] = '';
            return $result;
        }
        $result = array('code' => 100005, 'msg' => '添加失败', 'data' => array());
        return $result;
    }

    /**
     * 获取某经销商全部活动下的商品列表
     * @param array $param
     * @return array
     * @author quan
     * @since 2018-11-7
     */
    public static function getAllSellerGoods($param = [])
    {
        $result = array('code' => 0, 'msg' => '', 'data' => array());
        $activity_id = $param ['activity_id'];
        if (empty($activity_id)) {
            $result = array('code' => 100001, 'msg' => '活动id不能为空', 'data' => array());
            return $result;
        }

        $goods_ids = ActivityGoods::getOneByParam(['activity_id' => $activity_id]);
        if (empty($goods_ids)) {
            return $result;
        }

        $goods_id_list = explode(',', $goods_ids->goods_id);
        $param = ['id', $goods_id_list];
        $goods_list = Goods::getListByParamIn([], $param);
        $result ['data'] = $goods_list;
        return $result;
    }

    /**
     * 用户添加砍价商品（用户点击某一商品的按钮）
     * @param array $param
     * @return array
     * @author quan
     * @since 2018-11-7
     */
    public static function addGoodsToCut($param = [])
    {
        $result = array('code' => 0, 'msg' => '', 'data' => array());
        $activity_id = $param['activity_id'];
        $goods_id = $param['goods_id'];
        $user_id = $param['user_id'];
        $token = $param['token'];
        if (empty($activity_id)) {
            $result = array('code' => 100001, 'msg' => '活动ID不能为空', 'data' => array());
            return $result;
        }
        if (empty($goods_id)) {
            $result = array('code' => 100002, 'msg' => '商品ID不能为空', 'data' => array());
            return $result;
        }
        if (empty($user_id)) {
            $result = array('code' => 100003, 'msg' => '用户ID不能为空', 'data' => array());
            return $result;
        }
        if (empty($token)) {
            $result = array('code' => 100004, 'msg' => 'token不能为空', 'data' => array());
            return $result;
        }

        $user_info = User::getOneByParam(['id' => $user_id]);
        if (empty($user_info)) {
            $result = array('code' => 100005, 'msg' => '用户信息不存在', 'data' => array());
            return $result;
        }
        $activity_info = Activity::getOneByParam(['id' => $activity_id]);
        if (empty($activity_info)) {
            $result = array('code' => 100006, 'msg' => '活动信息不存在', 'data' => array());
            return $result;
        }
        $goods_info = Goods::getOneByParam(['id' => $goods_id]);
        if (empty($goods_info)) {
            $result = array('code' => 100007, 'msg' => '商品信息不存在', 'data' => array());
            return $result;
        }
        $data = array(
            'activity_id' => $activity_id,
            'goods_id' => $goods_id,
            'user_id' => $user_id,
        );
        $cut_info = Cut::getOneByParam($data);
        if (empty($cut_info)) {
            $data = array(
                'activity_id' => $activity_id,
                'goods_id' => $goods_id,
                'user_id' => $user_id,
                'already_cut_num' => 0,
                'is_finish' => 0,
                'created_at' => time(),
                'updated_at' => time(),
            );
            $cut_id = Cut::add($data);
        } else {
            $cut_id = $cut_info->id;
        }

        $result ['data'] ['cut_id'] = $cut_id;
        return $result;
    }

    /**
     * 通过砍价ID获取活动信息 、 商品信息 、 砍价详情
     * @param array $param
     * @return array
     * @author quan
     * @since 2018-11-7
     */
    public static function getCutInfo($param = [])
    {
        $result = array('code' => 0, 'msg' => '', 'data' => array());
        $cut_id = $param['cut_id'];
        if (empty($cut_id)) {
            $result = array('code' => 100001, 'msg' => '砍价ID不能为空', 'data' => array());
            return $result;
        }
        $cut_info = Cut::getOneByParam(['id' => $cut_id]);
        if (empty($cut_info)) {
            $result = array('code' => 100002, 'msg' => '找不到砍价详情信息', 'data' => array());
            return $result;
        }
        $activity_info = Activity::getOneByParam(['id' => $cut_info->activity_id]);
        $goods_info = Goods::getOneByParam(['id' => $cut_info->goods_id]);
        $result ['data'] ['activity_info'] = $activity_info;
        $result ['data'] ['goods_info'] = $goods_info;
        $result ['data'] ['cut_info'] = $cut_info;
        return $result;
    }

    /**
     * 获取砍价好友榜
     * @param array $param
     * @return array
     * @author quan
     * @since 2018-11-7
     */
    public static function getCutVisitor($param = [])
    {
        $result = array('code' => 0, 'msg' => '', 'data' => array());
        $cut_id = $param['cut_id'];
        if (empty($cut_id)) {
            $result = array('code' => 100001, 'msg' => '砍价ID不能为空', 'data' => array());
            return $result;
        }
        $visitor_ids_arr = json_decode(json_encode(CutVisitor::getListByParam(['cut_id' => $cut_id])), true);
        $visitor_ids = array_column($visitor_ids_arr, 'visitor_id');
        $param = ['id', $visitor_ids];
        $visitor_list = Visitor::getListByParamIn([], $param, null, null, ['id', 'wx_name', 'wx_head_img_url']);

        $result ['data'] ['visitor_cut_list'] = $visitor_list;
        return $result;
    }

    /**
     * 砍价
     * @param array $param
     * @return array
     * @author quan
     * @since 2018-11-7
     */
    public static function cut($param = [])
    {
        $result = array('code' => 0, 'msg' => '', 'data' => array());
        $cut_id = $param['cut_id'];
        if (empty($cut_id)) {
            $result = array('code' => 100001, 'msg' => '砍价ID不能为空', 'data' => array());
            return $result;
        }
        $cut_info = Cut::getOneByParam(['id'=>$cut_id]);
        if(empty($cut_info)){
            $result = array('code' => 100002, 'msg' => '砍价信息不存在', 'data' => array());
            return $result;
        }
        if($cut_info->is_finish == 1){
            $result = array('code' => 100003, 'msg' => '砍价已完成', 'data' => array());
            return $result;
        }
        $goods_info = Goods::getOneByParam(['id'=>$cut_info->goods_id]);
        DB::beginTransaction();
        $visitor_data = array(
            'wx_openid' => $param ['openid'],
            'wx_name' => $param ['wx_username'],
            'wx_head_img_url' => $param ['wx_head_img_url'],
            'created_at' => time(),
            'updated_at' => time(),
        );
        $visitor_id = Visitor::add($visitor_data);
        $cut_vis_id = CutVisitor::add(['cut_id'=>$cut_id,'visitor_id'=>$visitor_id]);
        $already_cut_num = (int)$cut_info->already_cut_num + 1;
        $data = array(
            'already_cut_num' => $already_cut_num,
            'updated_at' => time(),
        );
        if($already_cut_num >= $goods_info->need_cut_num){
            $data['is_finish'] = 1;
        }

        $row = Cut::updateById($data,$cut_id);
        if($visitor_id == false && $cut_vis_id == false && $row == false){
            DB::rollBack();
            $result = array('code' => 100007, 'msg' => '砍价失败', 'data' => array());
            return $result;
        }
        DB::commit();
        return $result;
    }

}
