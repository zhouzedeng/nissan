<?php
namespace Wangxun\Activity\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Wangxun\Common\Service\GoodsService;

/**
 * 商品控制器
 * Class UserController
 * @package App\Http\Controllers
 */
class GoodsController extends Controller
{
    /**
     * 列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('wangxun.goods.index');
    }

    /**
     * 添加页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('wangxun.goods.add');
    }

    /**
     * 获取活动列表
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList()
    {
        $result = GoodsService::getList(self::$allParams);
        return $result;
    }


    public function save()
    {
        $params = self::$allParams;
        if (empty($params['name'])) {
            return $this->apiFail('100001', '商品名称必填');
        }
        if (empty($params['price'])) {
            return $this->apiFail('100002', '商品价格必填');
        }
        if (empty($params['coupon_id'])) {
            return $this->apiFail('100003', '卡券必填');
        }
        if (empty($params['need_cut_num'])) {
            return $this->apiFail('100004', '砍价总数必须大于0');
        }
        if (empty($params['img'])) {
            return $this->apiFail('100003', '图片过大或活动背景图还没传哦');
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
        $params = self::$allParams;
        if (empty($params['id'])) {
            return $this->apiFail('100001', '商品ID必填');
        }
        $result = GoodsService::del($params);
        return $result;
    }
    /*
     * 编辑页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request){
        $params = self::$allParams;
        if($request->isMethod('post')){
            if (empty($params['name'])) {
                return $this->apiFail('100001', '商品名称必填');
            }
            if (empty($params['price'])) {
                return $this->apiFail('100002', '商品价格必填');
            }
            if (empty($params['coupon_price'])) {
                return $this->apiFail('100003', '卡券价格必须大于0');
            }
            if (empty($params['img'])) {
                return $this->apiFail('100003', '图片过大或活动背景图还没传哦');
            }
            $result =  GoodsService::updata_goods($params);
            return $result;
        }
        $where ['id'] = $params ['id'];
        $result = GoodsService::getFind($where);
        return view('wangxun.goods.edit',['goods_info'=>$result['data']]);
    }
}

