<?php

namespace App\Http\Controllers\Upload;

use App\Http\Controllers\Controller;
use App\Validator\FileValidator;
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

        // 验证文件参数
        $param = [];
        $param['file'] = [$file, true];
        $result_validate = FileValidator::validate($param);
        if (true !== $result_validate) {
            return $this->jsonReturn($result_validate);
        }

        // 储存图片
        $filename = "";
        $path = Storage::putFile($filename, $file);

        // 返回数据
        $ret = [];
        $ret['path'] = $path;
        return $this->succJsonReturn($ret);
    }
}

