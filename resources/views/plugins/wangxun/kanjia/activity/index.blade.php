@extends('layouts.app')

@section('content')
    <!-- 面板 -->
    <blockquote class="layui-elem-quote top-title"><h3>活动列表</h3></blockquote>

    <!-- 搜索 -->
    <div class="search">
        <a class="layui-btn" href="{{route('activity.add')}}" type="button">新增</a>
    </div>

    <!-- 表格 -->
    <table class="layui-hide" id="LAY_table_user" lay-filter="user"></table>

    <!-- 操作 -->
    <script type="text/html" id="qrcode">
        <a lay-event="qrcode" >查看二维码</a>
    </script>

    <!-- 操作 -->
    <script type="text/html" id="bar">
        <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
    </script>

    <!-- js -->
    <script type="text/javascript" src="http://static.runoob.com/assets/qrcode/qrcode.min.js"></script>
    <script>
        var full_url = "{{asset('storage')}}";
        var h5_url = "{{env('H5_URI_PREFIX')}}";
    </script>
    <script src="{{asset('/wangxun/activity/js/index.js')}}?v=555105"></script>

@endsection
