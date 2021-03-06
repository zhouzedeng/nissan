<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Comm\BaseController;
use Illuminate\Http\Request;
use App\Http\Model\GoodsSeries;
use App\Http\Service\GoodsService;

/**
 * 商品控制器
 * Class UserController
 * @package App\Http\Controllers
 * @author Zed
 * @since 2018-11-2
 */
class GoodsController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Zed
     * @since 2018-11-2
     */
    public function index()
    {
        return view('goods.index');
    }

    /**
     * 添加页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Zed
     * @since 2018-11-2
     */
    public function add()
    {
        return view('goods.add');
    }

    /**
     * 获取活动列表
     * @return \Illuminate\Http\JsonResponse
     * @author Zed
     * @since 2018-11-2
     */
    public function getList()
    {
        $result = GoodsService::getList($this->params);
        return $result;
    }

    /**
     * 保存商品信息
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author Zed
     * @since 2018-11-2
     */
    public function save()
    {
        $params = $this->params;
        if (empty($params['name'])) {
            return apiFail('100001', '商品名称必填');
        }
        if (empty($params['price'])) {
            return apiFail('100002', '商品价格必填');
        }
        if (empty($params['coupon_id'])) {
            return apiFail('100003', '卡券必填');
        }
        if (empty($params['need_cut_num'])) {
            return apiFail('100004', '砍价总数必须大于0');
        }
        if (empty($params['img'])) {
            return apiFail('100003', '图片过大或活动背景图还没传哦');
        }

        $result = GoodsService::save($params);
        return $result;
    }

    /**
     * 删除商品
     *  @return \Illuminate\Http\JsonResponse
     */
    public function del()
    {
        $params = $this->params;
        if (empty($params['id'])) {
            return apiFail('100001', '商品ID必填');
        }
        $result = GoodsService::del($params);
        return $result;
    }

    /**
     *
     * 编辑页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $params = $this->params;
        if($request->isMethod('post')){
            if (empty($params['name'])) {
                return apiFail('100001', '商品名称必填');
            }
            if (empty($params['price'])) {
                return apiFail('100002', '商品价格必填');
            }
            if (empty($params['coupon_price'])) {
                return apiFail('100003', '卡券价格必须大于0');
            }
            if (empty($params['img'])) {
                return apiFail('100003', '图片过大或活动背景图还没传哦');
            }
            $result = GoodsService::updata_goods($params);
            return $result;
        }

        $result = GoodsService::getFind($params);
        return view('wangxun.kanjia.goods.edit',['goods_info'=>$result['data']]);
    }

    /**
     * findGoodsSeries
     *  @return \Illuminate\Http\JsonResponse
     */
    public function findGoodsSeries(Request $request)
    {
        $params = $this->params;
        if (empty($params['goods_id'])) {
            return apiFail('100001', '商品ID必填');
        }
        $where = [];
        $where['goods_id'] = $params['goods_id'];
        $result = GoodsSeries::getOneByParam($where);
        if(empty($result)){
            return ['code'=> 100001];
        }
        return apiSuccess('success',$result);
    }
}

