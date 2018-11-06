@extends('layouts.app')

@section('content')
    <!-- 面板 -->
    <blockquote class="layui-elem-quote top-title"><h3>商品列表</h3></blockquote>

    <!-- 搜索 -->
    <div class="search">
        <a class="layui-btn" href="{{route('goods.add')}}" type="button">新增商品</a>
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
    </script>
    <script src="{{asset('/wangxun/goods/js/index.js')}}?v=1006"></script>

@endsection
