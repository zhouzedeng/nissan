@extends('layouts.app')

@section('content')
    <!-- 面板 -->
    <blockquote class="layui-elem-quote top-title"><h3>审核列表</h3></blockquote>
    <!-- 表格 -->
    <table class="layui-hide" id="LAY_table_user" lay-filter="user"></table>

    <!-- 操作 -->
    <script type="text/html" id="bar">
        <a class="layui-btn layui-btn-sm" lay-event="pass">审核通过</a>
        <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="no_pass">审核不通过</a>
    </script>

    <!-- js -->
    <script>
    </script>
    <script src="{{asset('/wangxun/verify/js/index.js')}}?v=1090"></script>

@endsection
