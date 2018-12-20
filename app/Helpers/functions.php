<?php
/**
 * api操作成功
 * @param string $msg
 * @param array $data
 * @return array
 */
function apiSuccess($msg = 'success', $data = [])
{
    $result = [
        'code' => 0,
        'msg' => $msg,
        'data' => $data
    ];
    return $result;
}

/**
 * api操作失败
 * @param $code
 * @param string $msg
 * @return array
 */
function apiFail($code, $msg = '操作失败')
{
    $result = [
        'code' => $code,
        'msg' => $msg,
    ];
    return $result;
}