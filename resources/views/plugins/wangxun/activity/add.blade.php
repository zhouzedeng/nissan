@extends('layouts.app')

@section('content')
    <!-- 面板 -->
    <blockquote class="layui-elem-quote top-title"><h3><a onclick="history.back()">活动管理</a> / 添加活动</h3></blockquote>
    <form class="layui-form">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="layui-form-item">
            <label class="layui-form-label">主题</label>
            <div class="layui-input-block">
                <input type="text" name="name" lay-verify="name" autocomplete="off" placeholder="请输入主题" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">品牌</label>
            <div class="layui-input-block">
                <input type="text" name="brand" lay-verify="brand" autocomplete="off" placeholder="请输入品牌" class="layui-input" >
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">开始时间</label>
                <div class="layui-input-inline">
                    <input type="text" name="start_time" id="start_time" lay-verify="start_time" placeholder="请选择日期" autocomplete="off" class="layui-input">
                </div>
            </div>  ------
            <div class="layui-inline">
                <label class="layui-form-label">结束时间</label>
                <div class="layui-input-inline">
                    <input type="text" name="end_time" id="end_time" lay-verify="end_time" placeholder="请选择日期" autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">活动说明</label>
            <div class="layui-input-block">
                <textarea name="desc" placeholder="请输入活动说明" class="layui-textarea" required></textarea>
            </div>
        </div>
        <div class="layui-form-item layui-form-text" lay-filter="goodslist">
            <label class="layui-form-label">关联商品</label>
            <div class="layui-input-block" style="max-height:120px;overflow: hidden;overflow-y:scroll;" id="goodslist">
            </div>
        </div>
        <input id="img" type="hidden" name="img" lay-verify="img">

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">活动背景图</label>
            <div class="layui-input-block">
                <div class="layui-upload">
                    <button type="button" class="layui-btn layui-btn-normal" id="testList">选择文件</button>
                    <button type="button" class="layui-btn" id="testListAction">开始上传</button>
                    <div class="layui-upload-list">
                        <table class="layui-table">
                            <thead>
                            <tr><th>文件名</th>
                                <th>大小</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr></thead>
                            <tbody id="demoList"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit="" lay-filter="mycommit">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>

    </form>

    <script>
    </script>
    <script src="{{asset('/wangxun/activity/js/add.js')}}?v=19000000"></script>

@endsection
