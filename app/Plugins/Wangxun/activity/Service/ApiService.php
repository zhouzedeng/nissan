<?php
namespace Wangxun\Activity\Service;

use Illuminate\Support\Facades\Redis;
use Wangxun\Activity\Model\Activity;
use Wangxun\Activity\Model\ActivityGoods;
use Wangxun\Activity\Model\Cut;
use Wangxun\Activity\Model\CutVisitor;
use Wangxun\Activity\Model\Goods;
use Wangxun\Activity\Model\Seller;
use Wangxun\Activity\Model\Series;
use Wangxun\Activity\Model\User;
use Wangxun\Activity\Model\Visitor;
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

        if (empty( $param['username'])) {
            $result = array('code' => 100001, 'msg' => '姓名不能为空', 'data' => array());
            return $result;
        }
        if (empty( $param['phone'])) {
            $result = array('code' => 100002, 'msg' => '手机号不能为空', 'data' => array());
            return $result;
        }
        if (empty( $param['code'])) {
            $result = array('code' => 100003, 'msg' => '验证码不能为空', 'data' => array());
            return $result;
        }
        if (empty( $param['car_series_id'])) {
            $result = array('code' => 100007, 'msg' => '车系ID不能为空', 'data' => array());
            return $result;
        }
        if (empty( $param['wx_name']) || empty( $param['wx_openid']) || empty( $param['wx_head_img_url'])) {
            $result = array('code' => 100004, 'msg' => '微信参数不能为空', 'data' => array());
            return $result;
        }

        $username = $param['username'];
        $phone = $param['phone'];
        $code = $param['code'];
        $seller_id = $param['seller_id'];
        $car_series_id = $param['car_series_id'];
        $wx_name = $param['wx_name'];
        $wx_openid = $param['wx_openid'];
        $wx_head_img_url = $param['wx_head_img_url'];
        //验证验证码
        $verifyCode = ThirdApiService::verifyCode($param);
        if($verifyCode ['data'] ['code'] == 0){
            $result = array('code' => 100006, 'msg' => '验证码错误', 'data' => array());
            return $result;
        }

        $data = array(
            'name' => $username,
            'phone' => $phone,
            'seller_id' => $seller_id,
            'wx_name' => $wx_name,
            'wx_openid' => $wx_openid,
            'wx_head_img_url' => $wx_head_img_url,
            'created_at' => time(),
            'updated_at' => time(),
        );
        $seller_info = Seller::getOneByParam(['id' => $seller_id]);
        if ($seller_info) {
            $data['seller_name'] = $seller_info->name;
        }
        $row = User::add($data);

        if ($row) {
            $data ['car_series_id'] = $car_series_id;
            //保存到车巴巴
            //ThirdApiService::clue($data);
            //生成token
            $token = md5(uniqid(microtime(true),true));
            Redis::set('token:'.$token,$row);
            //保存用户信息到redis
            $user_info = User::getOneByParam(['id'=>$row]);
            Redis::set('users:'.$row,json_encode($user_info));
            $result ['data'] ['userid'] = $row;
            $result ['data'] ['token'] = $token;
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
        $activity_id = isset($param ['activity_id']) ? $param ['activity_id'] : 0 ;
        $seller_id = isset($param ['seller_id']) ? $param ['seller_id'] : 0 ;
        $car_series_id =  isset($param ['car_series_id']) ? $param ['car_series_id'] : 0 ;
        if (empty($activity_id)) {
            $result = array('code' => 100001, 'msg' => '活动id不能为空', 'data' => array());
            return $result;
        }
      if (empty($seller_id)) {
            $result = array('code' => 100002, 'msg' => '经销商ID不能为空', 'data' => array());
            return $result;
        }
      if (empty($car_series_id)) {
            $result = array('code' => 100003, 'msg' => '车系ID不能为空', 'data' => array());
            return $result;
        }

        $goods_ids = ActivityGoods::getOneByParam(['activity_id' => $activity_id]);
        if (empty($goods_ids)) {
            return $result;
        }

        $goods_id_list = explode(',', $goods_ids->goods_id);
        $param = ['id', $goods_id_list];
        $goods_list = Goods::getListByParamIn([], $param);
        foreach ($goods_list as $k=>$v){
            $v->goods_img = config('plugin.api.open.app_img_url'). $v->goods_img;
        }
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
        $activity_id = isset($param['activity_id'])? $param['activity_id'] : 0;
        $goods_id = isset($param['goods_id'])? $param['goods_id'] : 0;
        $user_id = isset($param['user_id'])? $param['user_id'] : 0;;
        $token = isset($param['token'])? $param['token'] : '';
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
        //验证token
        $token_user_id = Redis::get('token:'.$token);
        if(empty($token_user_id ) || $token_user_id != $user_id){
            $result = array('code' => 100008, 'msg' => 'token验证失败', 'data' => array());
            return $result;
        }
        //用户信息缓存到Redis
        $user_info = json_decode(Redis::get('users:'.$user_id),true);
        if(empty($user_info)){
            $user_info = User::getOneByParam(['id' => $user_id]);
            if($user_info){
                Redis::set('users:'.$user_id,json_encode($user_info));
            }
        }
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
        $cut_id = isset($param['cut_id']) ? $param['cut_id'] : 0;
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
        $activity_info->bg_img_url = config('plugin.api.open.app_img_url').$activity_info->bg_img_url;
        $goods_info->goods_img = config('plugin.api.open.app_img_url').$goods_info->goods_img;
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
        $cut_id =  isset($param['cut_id']) ? $param['cut_id'] : 0;
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
        $wx_name = $param['wx_name'];
        $wx_openid = $param['wx_openid'];
        $wx_head_img_url = $param['wx_head_img_url'];
        $seller_id = $param['seller_id'];
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
        if (empty($wx_name) || empty($wx_openid) || empty($wx_head_img_url)) {
            $result = array('code' => 100004, 'msg' => '微信参数不能为空', 'data' => array());
            return $result;
        }

        DB::beginTransaction();
        //查询访客是否已经添加
        $visitor_info = Visitor::getOneByParam(['wx_openid'=>$param ['wx_openid']]);
        if(empty($visitor_info)){
            $visitor_data = array(
                'wx_openid' => $param ['wx_openid'],
                'wx_name' => $param ['wx_name'],
                'wx_head_img_url' => $param ['wx_head_img_url'],
                'created_at' => time(),
                'updated_at' => time(),
            );
            $visitor_id = Visitor::add($visitor_data);
        }else{
            $visitor_id = $visitor_info->id;
            //验证该用户是否已经帮砍过
            $cut_visitor = CutVisitor::getOneByParam(['cut_id'=>$cut_id,'visitor_id'=>$visitor_id]);
            if(!empty($cut_visitor)){
                $result = array('code' => 100008, 'msg' => '已经帮砍过', 'data' => array());
                return $result;
            }
        }
        $cut_vis_id = CutVisitor::add(['cut_id'=>$cut_id,'visitor_id'=>$visitor_id]);
        $already_cut_num = (int)$cut_info->already_cut_num + 1;
        $data = array(
            'already_cut_num' => $already_cut_num,
            'updated_at' => time(),
        );
        $goods_info = Goods::getOneByParam(['id'=>$cut_info->goods_id]);
        if($already_cut_num >= $goods_info->need_cut_num){
            $data['is_finish'] = 1;
        }

        $row = Cut::updateById($data,$cut_id);
        if($visitor_id == false || $cut_vis_id == false || $row == false){
            DB::rollBack();
            $result = array('code' => 100007, 'msg' => '砍价失败', 'data' => array());
            return $result;
        }
        DB::commit();
        //已完成情况下发送核销码
        if(isset($data['is_finish']) && $data['is_finish'] == 1){
            //用户信息缓存到Redis
            $user_info = json_decode(Redis::get('users:'.$cut_info->user_id),true);
            if(empty($user_info)){
                $user_info = User::getOneByParam(['id' => $cut_info->user_id]);
                if($user_info){
                    Redis::set('users:'.$cut_info->user_id,json_encode($user_info));
                }
                $user_info = json_decode(json_encode($user_info),true);
            }
            $coupon_data = [
                'coupon_id' => $goods_info->coupon_id,
                'mobile' => $user_info['phone'],
                'name' => $user_info['name'],
            ];
            //获取核销码
            $getCoupon = ThirdApiService::getCoupon($coupon_data);
            if($getCoupon ['data']['code'] == 1){
                $sen_data = [
                    'mobile' =>   $user_info->mobile,
                    'card_name' =>   $goods_info->coupon_title,
                    'card_code' =>   $getCoupon ['card_code'],
                ];
                //发送业务短信
                ThirdApiService::sendSms($sen_data);
            }
        }
        return $result;
    }

    /**
     * 通过活动ID和seller_id获取活动详情
     * @param array $param
     * @return array
     * @author quan
     * @since 2018-11-8
     */
    public static function getActivity($param = [])
    {
        $result = array('code' => 0, 'msg' => '', 'data' => array());
        $activity_id = isset($param['activity_id']) ? $param['activity_id'] : 0;
        $seller_id = isset($param['seller_id']) ? $param['seller_id'] : 0;
        if (empty($activity_id)) {
            $result = array('code' => 100001, 'msg' => '活动ID不能为空', 'data' => array());
            return $result;
        }
        if (empty($seller_id)) {
            $result = array('code' => 100001, 'msg' => 'ID不能为空', 'data' => array());
            return $result;
        }

        $activity_info = Activity::getOneByParam(['id'=>$activity_id,'seller_id'=>$seller_id]);
        $activity_info->bg_img_url = config('plugin.api.open.app_img_url').$activity_info->bg_img_url;
        $result ['data'] = $activity_info;
        return $result;
    }

    /**
     * 获取车系
     * @param array $param
     * @return array
     * @author quan
     * @since 2018-11-14
     */
    public static function getSeries($param = [])
    {
        $result = array('code' => 0, 'msg' => '', 'data' => array());

        $series_info = Series::getListByParam();
        $result ['data'] = $series_info;
        return $result;
    }
}
