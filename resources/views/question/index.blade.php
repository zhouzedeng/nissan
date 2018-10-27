@extends('layouts.app')

@section('content')
    <!-- 面板 -->
    <blockquote class="layui-elem-quote top-title"><h3>问题管理</h3></blockquote>

    <!-- 搜索 -->
    <div class="search">
        <a class="layui-btn" href="{{route('user.add')}}" type="button">新增</a>
        <a class="layui-btn" id="export" type="button">导出</a>
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
        var export_url =  "{{route('user.export')}}";
    </script>
    <script src="{{asset('js/question/index.js')}}?v=4"></script>

@endsection
