<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Users;
use App\Service\UserService;

/**
 * 用户控制器
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * 列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
       return view('user.index');
    }

    /**
     * 添加页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('user.add');
    }

    /**
     * 编辑页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('user.edit');
    }

    /**
     * 查看页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('user.show');
    }

    /**
     * 获取用户列表数据
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList()
    {
        // 业务处理
        $result = UserService::getUserList(self::$allParams);

        // 返回数据
        return $result;
    }

    /**
     * 保存新增用户信息
     * @return \Illuminate\Http\JsonResponse
     */
    public function save()
    {
        // 获取参数
        $sex      = my_input('sex');
        $age      = my_input('age');
        $phone    = my_input('phone');
        $email    = my_input('email');
        $remark   = my_input('remark');
        $status   = my_input('status');
        $username = my_input('username');
        $password = my_input('password');
        $birthday = my_input('birthday');

        // 验证用户参数
        $param = [];
        $param['sex'] = [$sex, true];
        $param['age'] = [$age, true];
        $param['email'] = [$email, true];
        $param['phone'] = [$phone, true];
        $param['remark'] = [$remark, false];
        $param['username'] = [$username, true];
        $param['password'] = [$password, true];
        $result_validate = UserValidator::validate($param);
        if (true !== $result_validate) {
            return $this->jsonReturn($result_validate);
        }

        // 验证时间参数
        $param = [];
        $param['birthday'] = [$birthday, true];
        $result_validate = DtValidator::validate($param);
        if (true !== $result_validate) {
            return $this->jsonReturn($result_validate);
        }

        // 验证公共参数
        $param = [];
        $param['status'] = [$status, true];
        $result_validate = CommValidator::validate($param);
        if (true !== $result_validate) {
            return $this->jsonReturn($result_validate);
        }

        // 保存数据
        $now = time();
        $param = [];
        $param['password'] = bcrypt($password);
        $param['age'] = $age;
        $param['email'] = $email;
        $param['phone'] = $phone;
        $param['sex'] = $sex;
        $param['remark'] = $remark;
        $param['name'] = $username;
        $param['birthday'] = strtotime($birthday);
        $param['status'] = $status;
        $param['created_at'] = $now;
        $param['updated_at'] = $now;
        $result = Users::add($param);
        if (!$result) {
            $log = [];
            $log['$msg'] = '添加用户失败';
            Log::debug(__METHOD__.'('.__LINE__.'):'.format_log($log));
            $ret = config('status.500');
            return $this->jsonReturn($ret);
        }

        // 返回数据
        return $this->succJsonReturn();
    }

    /**
     * 导出用户信息
     */
    public function export()
    {
        // 获取参数
        $uid = my_input('uid');
        $name = my_input('name');

        // 查询数据
        $sort = 'id';
        $order = 'desc';
        $param = [];
        $param['name'] = ['like', "%" . $name . "%"];
        $param['id'] = $uid;
        $cols = ['id', 'name', 'age', 'sex', 'email', 'created_at', 'updated_at'];
        $user_list = Users::getColListByParam($cols, $param, null, null , $sort, $order);

        // 数据处理
        $cellData = [];
        $cellData[] = ['ID', '用户名', '年龄', '性别', '邮箱', '创建时间', '修改时间'];
        foreach ($user_list as $k => $user) {
            $tmp = [];
            $tmp[] = $user->id;
            $tmp[] = $user->name;
            $tmp[] = $user->age;
            $sex = $user->sex == 1 ? '男' : '女';
            $tmp[] = $sex;
            $tmp[] = $user->email;
            $tmp[] = $user->created_at;
            $tmp[] = $user->updated_at;
            $cellData[] = $tmp;
        }

        // 导出数据
        Excel::create('用户列表',function($excel) use ($cellData){
            $excel->sheet('users', function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
    }
}

