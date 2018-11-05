<?php
namespace Wangxun\Activity\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Wangxun\Common\Service\ActivityService;

/**
 * 活动控制器
 * Class UserController
 * @package App\Http\Controllers
 */
class ActivityController extends Controller
{
    /**
     * 列表页
     */
    public function index()
    {
        return view('wangxun.activity.index');
    }

    /**
     * 添加页
     */
    public function add()
    {
        return view('wangxun.activity.add');
    }

    /**
     * 获取活动接口
     */
    public function getList()
    {
        $result = ActivityService::getList(self::$allParams);
        return $result;
    }

    /**
     * 新增活动接口
     */
    public function save()
    {
        $params = self::$allParams;
        if (empty($params['name'])) {
            return $this->apiFail('100001', '主题必填');
        }
        if (empty($params['brand'])) {
            return $this->apiFail('100002', '品牌必填');
        }
        if (empty($params['desc'])) {
            return $this->apiFail('100003', '活动描述必填');
        }
        if (empty($params['img'])) {
            return $this->apiFail('100003', '图片过大或活动背景图还没传');
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
        $params = self::$allParams;
        if (empty($params['id'])) {
            return $this->apiFail('100001', '活动ID必填');
        }
        $result = ActivityService::del($params);
        return $result;
    }

    /**
    * 编辑页面
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function edit(Request $request){
        $params = self::$allParams;
        if($request->isMethod('post')){
            if (empty($params['name'])) {
                return $this->apiFail('100001', '主题必填');
            }
            if (empty($params['brand'])) {
                return $this->apiFail('100002', '品牌必填');
            }
            if (empty($params['desc'])) {
                return $this->apiFail('100003', '活动描述必填');
            }
            if (empty($params['img'])) {
                return $this->apiFail('100003', '图片过大或活动背景图还没传');
            }
            $result =  ActivityService::updata_goods($params);
            return $result;
        }
        $where ['id'] = $params ['id'];
        $result = ActivityService::getFind($where);
        return view('wangxun.activity.edit',['activity_info'=>$result['data']]);
    }
}

