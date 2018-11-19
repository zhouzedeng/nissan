<?php
namespace Wangxun\Kanjia\Service;

use Wangxun\Kanjia\Model\Goods;
use Wangxun\Kanjia\Model\GoodsSeries;

/**
 * 商品业务
 * Class GoodsService
 * @package Wangxun\Common\Service
 * @author Zed
 * @since 2018-11-2
 */
class GoodsService extends BaseService
{
    /**
     * 获取商品列表数据
     * @param array $data
     * @return array
     * @author Zed
     * @since 2018-11-2
     */
    public static function getList($data = [])
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());

        // 查询数据
        $userInfo = session('user_info');
        $param = [];
        $order = array('id' , 'desc');
        $param['seller_id'] = $userInfo->store_id;
        $param['deleted_at'] = 0;
        $list = Goods::getListByParam($param, $data['page'], $data['limit'], null, $order);
        $total = Goods::getCntByParam($param);
        foreach ($list as $k => $v) {
            //$list[$k]->goods_img = asset('/storage/'.$v->goods_img);
            $list[$k]->goods_img = 'https://'.env('OSS_CDN_DOMAIN').'/'.$v->goods_img;
            $list[$k]->created_at = date("Y-m-d H:i:s", $v->created_at);
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
     * @author Zed
     * @since 2018-11-2
     */
    public static function save($params = array())
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());
        $res = ThirdApiService::getCouponInfo(['couponId' => $params['coupon_id']]);
        if (!empty($res['code'])) {
            $result = array('code' => 200001,  'msg' => '卡券ID错误', 'data' => array());
            return $result;
        }
        if (empty($res['data']->card_id)) {
            $result = array('code' => 200001,  'msg' => '卡券ID错误', 'data' => array());
            return $result;
        }
        $userInfo = session('user_info');
        $data = [
            'goods_name' => $params['name'],
            'goods_price' => $params['price'],
            'coupon_id'  => $params['coupon_id'],
            'goods_img' => $params['img'],
            'seller_id' => $userInfo->store_id,
            'coupon_price' => 0,
            'need_cut_num' => $params['need_cut_num'],
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
        $actGoods = [
            'goods_id' => $rs,
            'series_ids' => implode(',',array_keys($params ['series'])),
        ];
        GoodsSeries::add($actGoods);
        return $result;
    }

    /**
     * 删除商品数据
     * @param array $params
     * @return array
     * @author shengquan
     * @since 2018-11-2
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
    public static function getFind($params = [])
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());
        // 查询数据
        $userInfo = session('user_info');
        $where = [];
        $where ['id'] = $params ['id'];
        $where['seller_id'] = $userInfo->store_id;
        $where['deleted_at'] = 0;
        $find = Goods::getOneByParam($where,'*');
        $find->storage_goods_img = 'https://'.env('OSS_CDN_DOMAIN').'/'.$find->goods_img;
        $result['data'] = $find;
        return $result;
    }

    /**
     * 修改商品数据
     * @param array $params
     * @return array
     * @author shengquan
     * @since 2018-11-2
     */
    public static function updata_goods($params = array())
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());
        $data = [
            'goods_name' => $params['name'],
            'goods_price' => $params['price'],
            'coupon_price'  => $params['coupon_price'],
            'need_cut_num'  => $params['need_cut_num'],
            'goods_img' => $params['img'],
            'updated_at' => time()
        ];
        $rs = Goods::updateById($data,$params['id']);
        if (empty($rs)) {
            $result['code'] = '100004';
            $result['msg'] = '修改失败';
        }

        $act_goods_info = GoodsSeries::getOneByParam(['goods_id'=>$params['id']]);
        $actGoods = [
            'goods_id' => $params['id'],
            'series_ids' => implode(',',array_keys($params ['series'])),
        ];
        if($act_goods_info){
            GoodsSeries::updateById($actGoods,$act_goods_info->id);
        }else{
            GoodsSeries::add($actGoods);
        }
        return $result;
    }
}

