<?php
if (!function_exists('get_plugin_open_api_access_token')) {
    function get_plugin_open_api_access_token()
    {
        return \Illuminate\Support\Facades\Redis::get('plugin:open:api:access_token');
    }
}