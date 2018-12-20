<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Comm\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * 上传控制器类
 * Class UserController
 * @package App\Http\Controllers
 * @author Zed
 * @since 2018-11-1
 */
class UploadController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 上传图片文件接口
     * @return \Illuminate\Http\JsonResponse
     * @author Zed
     * @since 2018-11-1
     */
    public function upload(Request $request)
    {
        // 获取参数
        $file = $request->file('file');

        // 储存图片
        $filename = "/img";
        $path = Storage::disk('oss')->putFile($filename, $file);

        // 返回数据
        $data = [];
        $data['path'] = $path;
        return apiSuccess('成功', $data);
    }
}

