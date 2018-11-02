<?php
namespace Wangxun\Activity\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * 用户控制器
 * Class UserController
 * @package App\Http\Controllers
 */
class UploadController extends Controller
{
    /**
     * 上传图片文件接口
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        // 获取参数
        $file = $request->file('file');

        // 储存图片
        $filename = "";
        $path = Storage::disk('public')->putFile($filename, $file);

        // 返回数据
        $data = [];
        $data['path'] = $path;
        return $this->apiSuccess('成功', $data);
    }
}

