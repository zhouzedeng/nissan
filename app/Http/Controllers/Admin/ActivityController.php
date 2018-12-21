<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Comm\BaseController;
use Illuminate\Http\Request;
use App\Http\Model\ActivityGoods;
use App\Http\Service\ActivityService;

/**
 * 活动控制器
 * Class UserController
 * @package App\Http\Controllers
 * @author Zed
 * @since 2018-11-1
 */
class ActivityController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 列表页
     * @author Zed
     * @since 2018-11-1
     */
    public function index()
    {
        return view('activity.index');
    }

    /**
     * 添加页
     * @author Zed
     * @since 2018-11-1
     */
    public function add()
    {
        return view('activity.add');
    }

    /**
     * 获取活动接口
     * @author Zed
     * @since 2018-11-1
     */
    public function getList()
    {
        $result = ActivityService::getList($this->params);
        return $result;
    }

    /**
     * 新增活动接口
     * @author Zed
     * @since 2018-11-1
     */
    public function save()
    {
        $params = $this->params;
        if (empty($params['name'])) {
            return apiFail('100001', '主题必填');
        }
        if (empty($params['brand'])) {
            return apiFail('100002', '品牌必填');
        }
        if (empty($params['desc'])) {
            return apiFail('100003', '活动描述必填');
        }
        if (empty($params['img'])) {
            return apiFail('100004', '图片过大或活动背景图还没传');
        }
        if (empty($params['start_time'])) {
            return apiFail('100005', '活动开始时间不能为空');
        }
        if (empty($params['end_time'])) {
            return apiFail('100006', '活动结束时间不能为空');
        }
        if (strtotime($params['start_time']) >= strtotime($params['end_time'])) {
            return apiFail('100007', '活动结束时间必须大于活动开始时间');
        }

        $result = ActivityService::save($params);
        return $result;
    }

    /**
     * 删除活动
     *  @return \Illuminate\Http\JsonResponse
     */
    public function del()
    {
        $params = $this->params;
        if (empty($params['id'])) {
            return apiFail('100001', '活动ID必填');
        }
        $result = ActivityService::del($params);
        return $result;
    }

    /**
    * 编辑页面
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function edit(Request $request)
    {
        $params = $this->params;
        if($request->isMethod('post')){
            if (empty($params['name'])) {
                return apiFail('100001', '主题必填');
            }
            if (empty($params['brand'])) {
                return apiFail('100002', '品牌必填');
            }
            if (empty($params['desc'])) {
                return apiFail('100003', '活动描述必填');
            }
            if (empty($params['img'])) {
                return apiFail('100003', '图片过大或活动背景图还没传');
            }
            if (empty($params['start_time'])) {
                return apiFail('100005', '活动开始时间不能为空');
            }
            if (empty($params['end_time'])) {
                return apiFail('100006', '活动结束时间不能为空');
            }
            if (strtotime($params['start_time']) >= strtotime($params['end_time'])) {
                return apiFail('100007', '活动结束时间必须大于活动开始时间');
            }
            if (empty($params['goods_id'])) {
                $params['goods_id'] = [];
            }
            $result =  ActivityService::updata_goods($params);
            return $result;
        }
        $result = ActivityService::getFind($params);
        return view('activity.edit',['activity_info'=>$result['data']]);
    }

    /**
     * 查询活动关联商品
     *  @return \Illuminate\Http\JsonResponse
     */
    public function fingActivityGoods()
    {
        $params = $this->params;
        if (empty($params['activity_id'])) {
            return apiFail('100001', '活动ID必填');
        }
        $where = [];
        $where['activity_id'] = $params['activity_id'];
        $result = ActivityGoods::getOneByParam($where);
        return apiSuccess('success',$result);
    }
}

