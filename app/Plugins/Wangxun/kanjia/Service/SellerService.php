<?php
namespace Wangxun\Kanjia\Service;

use Illuminate\Http\Request;
use Wangxun\Kanjia\Model\Activity;
use Wangxun\Kanjia\Model\Seller;

/**
 * 经销商业务类
 * Class SellerService
 * @package Wangxun\Common\Service
 * @author Zed
 * @since 2018-11-4
 */
class SellerService extends BaseService
{
    /**
     * 新增经销商
     * @param array $seller
     * @return array
     * @author Zed
     * @since 2018-11-4
     */
    public static function save()
    {
        $userInfo = session('user_info');
        $seller_record = Seller::getOneByParam(['id' => $userInfo->store_id]);
        if (!$seller_record) {
            $data = [
                'id' =>  $userInfo->store_id,
                'name' =>  $userInfo->store_name,
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
     * @since 2018-11-4
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
     * @since 2018-11-4
     */
    public static function getFind($where = [])
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());
        // 查询数据
        $userInfo = session('user_info');
        $where['seller_id'] = $userInfo->store_id;
        $where['deleted_at'] = 0;
        $find = Activity::getOneByParam($where,'*');
        $find->storage_bg_img_url =  'https://'.env('OSS_CDN_DOMAIN').'/'.$find->bg_img_url;
        $result['data'] = $find;
        return $result;
    }

    /**
     * 修改商品数据
     * @param array $params
     * @return array
     * @author shengquan
     * @since 2018-11-4
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

    public static function getCookieToken(Request $request)
    {
        return $request->cookie('token');
    }
}
