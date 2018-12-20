<?php
namespace App\Http\Service;

use App\Http\Model\Activity;

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
     * 通过活动详情
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
        $activity_info->bg_img_url =  'https:'.env('OSS_CDN_DOMAIN').'/'.$activity_info->bg_img_url;
        $result ['data'] = $activity_info;
        return $result;
    }
}
