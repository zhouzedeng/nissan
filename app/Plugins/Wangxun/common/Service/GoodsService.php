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
        $list = Goods::getListByParam($param, $data['page'], $data['limit'], null, $order);
        $total = Goods::getCntByParam($param);

        // return
        $result['data'] = $list;
        $result['count'] = $total;
        return $result;
    }

    /**
     * 保存商品数据
     * @param array $params
     * @return array
     * @author zhouzedeng
     */
    public static function save($params = array())
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());
        $userInfo = session('user_info');
        $data = [
            'goods_name' => $params['name'],
            'goods_price' => $params['price'],
            'coupon_id'  => $params['coupon_id'],
            'goods_img' => $params['img'],
            'seller_id' => $userInfo->seller->sellerId,
            'coupon_price' => 0,
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
}
