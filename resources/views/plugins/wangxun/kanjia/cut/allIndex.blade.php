@extends('layouts.app')

@section('content')
    <!-- 面板 -->
    <blockquote class="layui-elem-quote top-title"><h3>砍价列表</h3></blockquote>

    <!-- 表格 -->
    <table class="layui-hide" id="LAY_table_user" lay-filter="user"></table>

    <!-- 操作 -->
    <script type="text/html" id="bar">
      {{--  <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>--}}
    </script>

    <!-- js -->
    <script>
        var full_url = "{{asset('storage')}}";
    </script>
    <script src="{{asset('/wangxun/cut/js/allIndex.js')}}?v=175591559505"></script>

@endsection
