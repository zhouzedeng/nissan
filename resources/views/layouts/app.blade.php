<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>创意活动后台</title>
    <link rel="stylesheet" href="{{asset('layui/css/layui.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}?v=1000">
</head>
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('layui/layui.js')}}"></script>
<script src="{{asset('js/echarts.min.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    layui.use('element', function(){
        var element = layui.element;
    });
</script>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">回收宝管理系统</div>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item"><a href="{{route('admin.logout')}}">退出</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="{{route('home.index')}}">首页</a>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">目录一</a>
                    <dl class="layui-nav-child">
                        <dd><a href="{{route('activity.index')}}">子目录一</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="{{route('goods.index')}}">子目录二</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        @yield('content')
    </div>

    <div class="layui-footer">
        © 科技有限公司
    </div>
</div>
</body>
</html>

