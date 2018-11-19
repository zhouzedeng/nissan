@extends('layouts.app')

@section('content')
    <!-- 面板 -->
    <blockquote class="layui-elem-quote top-title"><h3>砍价商品库</h3></blockquote>

    <!-- 搜索 -->
    <div class="search">
        <a class="layui-btn" href="{{route('bargain.add')}}" type="button">新增砍价商品</a>
        <a class="layui-btn" id="export" type="button">导出商品库</a>
    </div>

    <!-- 表格 -->
    <table class="layui-hide" id="LAY_table_user" lay-filter="user"></table>

    <!-- 操作 -->
    <script type="text/html" id="bar">
        <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
    </script>

    <!-- js -->
    <script>
        var export_url =  "";
    </script>
    <script src="{{asset('/wangxun/bargain/js/index.js')}}?v=4"></script>

@endsection
