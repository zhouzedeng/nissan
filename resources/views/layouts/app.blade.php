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
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;
    });
</script>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">后台管理系统</div>
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="{{route('home.index')}}">控制台</a></li>
        </ul>
      {{--  <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item"><a href="">退出</a></li>
        </ul>--}}
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">

            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">砍价游戏</a>
                    <dl class="layui-nav-child">
                        <dd><a href="{{route('activity.index')}}">砍价活动</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="{{route('goods.index')}}">砍价商品库</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="{{route('cut.index')}}">用户砍价数据</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="{{route('user.index')}}">用户列表</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="{{route('visitor.index')}}">访客列表</a></dd>
                    </dl>
                </li>
            </ul>

            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;"> 总部后台</a>
                    <dl class="layui-nav-child">
                        <dd><a href="{{route('verify.index')}}">全部活动审核</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="{{route('cut.allIndex')}}">全部用户砍价数据</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="{{route('user.allIndex')}}">全部用户</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="{{route('visitor.allIndex')}}">全部访客</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="{{route('count.index')}}">数据统计</a></dd>
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

