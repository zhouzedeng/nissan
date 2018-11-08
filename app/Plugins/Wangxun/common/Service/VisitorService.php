<?php
namespace Wangxun\Common\Service;

use Wangxun\Common\Model\Visitor;

/**
 * VisitorService
 * Class VisitorService
 * @package Wangxun\Common\Service
 * @author Zed
 * @since 2018-11-6
 */
class VisitorService extends BaseService
{
    /**
     * 获取列表数据
     * @param array $data
     * @return array
     * @author Zed
     * @since 2018-11-6
     */
    public static function getList($data = [])
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());

        // 查询数据
        $param = [];
        $param['seller_id'] = $data['seller']['seller']['sellerId'];
        $order = array('id' , 'desc');
        $list = Visitor::getListByParam($param, $data['page'], $data['limit'], null, $order);
        $total = Visitor::getCntByParam($param);
        foreach ($list as $k => $v) {
            $list[$k]->created_at = date("Y-m-d H:i:s", $v->created_at);
        }

        // return
        $result['data'] = $list;
        $result['count'] = $total;
        return $result;
    }

    /**
     * 获取列表数据
     * @param array $data
     * @return array
     * @author Zed
     * @since 2018-11-6
     */
    public static function getAllList($data = [])
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());

        // 查询数据
        $param = [];
        $order = array('id' , 'desc');
        $list = Visitor::getListByParam($param, $data['page'], $data['limit'], null, $order);
        $total = Visitor::getCntByParam($param);
        foreach ($list as $k => $v) {
            $list[$k]->created_at = date("Y-m-d H:i:s", $v->created_at);
        }

        // return
        $result['data'] = $list;
        $result['count'] = $total;
        return $result;
    }
}
