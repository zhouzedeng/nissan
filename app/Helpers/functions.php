<?php

/**
 * @param int $code
 * @param string $msg
 * @throws Exception
 * @Author Zed
 * @Time 2018/12/29 15:03
 */
function apiFail($code = 100000, $msg = 'error')
{
    throw new Exception($msg, $code);
}

/**
 * @param array $data
 * @param string $msg
 * @return \Illuminate\Http\JsonResponse
 * @Author Zed
 * @Time 2018/12/29 14:55
 */
function apiSuccess($data = [], $msg = 'success')
{
    $result = [
        'code' => 0,
        'msg' => $msg,
        'data' => $data
    ];
    return response()->json($result);
}