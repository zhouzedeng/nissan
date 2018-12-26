<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Comm\BaseController;
use App\Http\Service\ApiService;
use App\Http\Service\ThirdApiService;

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
     * 通过活动ID和seller_id获取活动详情
     * @author shengquan
     * @since 2018-11-8
     */
    public function getActivity()
    {
        $result = ApiService::getActivity($this->params);
        return $result;

    }
}

