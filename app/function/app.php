<?php

/**
 * 获取http输入($_REQUEST)
 * @param string|null $key
 * @param mixed|null $default
 * @param string|array|null $filter
 * @return mixed|null
 */
function my_input($key = null, $default = null, $filter = null)
{
    // 当unset时，返回默认值
    if (!isset($_REQUEST[$key])) {
        return $default;
    }

    $val = $_REQUEST[$key];
    $val = is_string($val) ? trim($val) : $val;

    // 当$val为空字符串， 并且过滤条件为null时，返回默认值
    if (('' === $val) && is_null($filter)) {
        return $default;
    }

    // 有过滤条件时，继续处理输入
    if (is_string($filter)) {
        $val = call_user_func($filter, $val);
        return (false !== $val) ? $val : $default;
    }
    if (is_array($filter)) {
        foreach ($filter as $v) {
            $val = call_user_func($v, $val);
            if (false === $val) {
                return $default;
            }
        }
    }

    return $val;
}
