<?php
namespace Wangxun\Kanjia\Controllers;

use Wangxun\Kanjia\Service\ApiService;

/**
 * ApiController
 * Class ApiController
 * @package Wangxun\Activity\Controllers
 * @author shengquan
 * @since 2018-11-7
 */
class ApiController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 新增用户接口
     * @author shengquan
     * @since 2018-11-7
     */
    public function addUser()
    {
        $result = ApiService::addUser($this->params);
        return $result;

    }
    /**
     * 获取某经销商某个活动下的商品列表
     * @author shengquan
     * @since 2018-11-7
     */
    public function getAllSellerGoods()
    {
        $result = ApiService::getAllSellerGoods($this->params);
        return $result;

    }
    /**
     * 用户添加砍价商品（用户点击某一商品的“立即砍价”按钮）
     * @author shengquan
     * @since 2018-11-7
     */
    public function addGoodsToCut()
    {
        $result = ApiService::addGoodsToCut($this->params);
        return $result;

    }
    /**
     * 通过砍价ID获取活动信息 、 商品信息 、 砍价详情
     * @author shengquan
     * @since 2018-11-7
     */
    public function getCutInfo()
    {
        $result = ApiService::getCutInfo($this->params);
        return $result;

    }
    /**
     * 获取砍价好友榜
     * @author shengquan
     * @since 2018-11-7
     */
    public function getCutVisitor()
    {
        $result = ApiService::getCutVisitor($this->params);
        return $result;

    }

    /**
     * 好友砍价
     * @author shengquan
     * @since 2018-11-7
     */
    public function cut()
    {
        $result = ApiService::cut($this->params);
        return $result;

    }
    /**
     * 通过活动ID和seller_id获取活动详情
     * @author shengquan
     * @since 2018-11-8
     */
    public function getActivity()
    {
        $result = ApiService::getActivity($this->params);
        return $result;

    }

    /**
     *  获取车系
     * @author shengquan
     * @since 2018-11-14
     */
    public function getSeries()
    {
        $result = ApiService::getSeries($this->params);
        return $result;

    }

}

