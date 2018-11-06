<?php
namespace Wangxun\Common\Service;

use Wangxun\Common\Model\Goods;

/**
 * 商品业务
 * Class GoodsService
 * @package Wangxun\Common\Service
 * @author zhouzedeng
 */
class GoodsService
{
    /**
     * 获取商品列表数据
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
        $order = array('id' , 'desc');
        $param['seller_id'] = $userInfo->seller->sellerId;
        $param['deleted_at'] = 0;
        $list = Goods::getListByParam($param, $data['page'], $data['limit'], null, $order);
        $total = Goods::getCntByParam($param);
        foreach ($list as $k => $v) {
            $list[$k]->goods_img = asset('/storage/'.$v->goods_img);
        }

        // return
        $result['data'] = $list;
        $result['count'] = $total;
        return $result;
    }

    /**
     * 保存商品数据
     * @param array $params
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function save($params = array())
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());
        $userInfo = session('user_info');
        $res = ThirdApiService::getCouponInfo(['couponId' => $params['coupon_id']]);
        if (!empty($res['code'])) {
            $result = array('code' => 200001,  'msg' => '卡券ID错误', 'data' => array());
            return $result;
        }
        if (empty($res['data']->card_id)) {
            $result = array('code' => 200001,  'msg' => '卡券ID错误', 'data' => array());
            return $result;
        }

        $data = [
            'goods_name' => $params['name'],
            'goods_price' => $params['price'],
            'coupon_id'  => $params['coupon_id'],
            'goods_img' => $params['img'],
            'seller_id' => $userInfo->seller->sellerId,
            'coupon_price' => 0,
            'card_code' => empty($res['data']->card_code) ? '' : $res['data']->card_code,
            'card_id' => empty($res['data']->card_id) ? 0 : $res['data']->card_id,
            'coupon_title' => empty($res['data']->coupon_title) ? '' : $res['data']->coupon_title,
            'coupon_desc' => empty($res['data']->coupon_desc) ? '' : $res['data']->coupon_desc,
            'created_at' => time(),
            'updated_at' => time()
        ];
        $rs = Goods::add($data);
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
        $rs = Goods::updateById($data,$params['id']);
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
        $find = Goods::getOneByParam($where,'*');
        $find->storage_goods_img = '/storage/'.$find->goods_img;
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
            'goods_name' => $params['name'],
            'goods_price' => $params['price'],
            'coupon_id'  => $params['coupon_id'],
            'goods_img' => $params['img'],
            'updated_at' => time()
        ];
        $rs = Goods::updateById($data,$params['id']);
        if (empty($rs)) {
            $result['code'] = '100004';
            $result['msg'] = '修改失败';
        }
        return $result;
    }
}

