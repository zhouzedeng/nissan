<?php

namespace Wangxun\Common\Service;

use Wangxun\Common\Model\Goods;

class GoodsService
{
    /**
     * @param array $data
     * @return array
     */
    public static function getList($data = [])
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());

        // 查询数据
        $param = [];
        $order = array('id' , 'desc');
        $list = Goods::getListByParam($param, $data['page'], $data['limit'], null, $order);
        $total = Goods::getCntByParam($param);

        // return
        $result['data'] = $list;
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
