<?php
namespace Wangxun\Activity\Service;

use Wangxun\Activity\Model\Series;

/**
 * SeriesService
 * Class SeriesService
 * @package Wangxun\Common\Service
 * @author Zed
 * @since 2018-11-6
 */
class SeriesService extends BaseService
{
    public static function save($params = [])
    {
        $api_list = json_decode(json_encode($params), true);
        $db_list = Series::getListByParam([]);
        $db_list = json_decode(json_encode($db_list), true);
        $db_gc_id_list = array_column($db_list, 'gc_id');
        $data = [];
        foreach ($api_list['carSeriesInfos'] as $k => $v) {
            if (!in_array($v['gcId'], $db_gc_id_list)) {
                $data[] = array(
                    'gc_id' => $v['gcId'],
                    'gc_name' => $v['gcName']
                );
            }
        }
        if ($data) {
            Series::addList($data);
        }
    }
}
