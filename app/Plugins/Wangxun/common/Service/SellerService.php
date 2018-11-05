<?php
namespace Wangxun\Common\Service;

use Wangxun\Common\Model\Activity;
use Wangxun\Common\Model\Seller;

class SellerService
{
    /**
     * @return mixed
     */
    public static function getSeller()
    {
        return json_decode(json_encode(session('user_info')), true);
    }

    /**
     * 新增
     * @param array $seller
     * @return array
     * @author zhouzedeng
     */
    public static function save($seller)
    {
        $seller_record = Seller::getOneByParam(['id' => $seller['seller']['sellerId']]);
        if (!$seller_record) {
            $data = [
                'id' => $seller['seller']['sellerId'],
                'name' => $seller['seller']['sellerName'],
                'created_at' => time(),
                'updated_at' => time()
            ];
            Seller::add($data);
        }
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
        if (empty($rs)) {
            $result['code'] = '100004';
            $result['msg'] = '修改失败';
        }
        return $result;
    }
}
