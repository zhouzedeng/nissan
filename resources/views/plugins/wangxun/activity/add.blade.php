@extends('layouts.app')

@section('content')
    <!-- 面板 -->
    <blockquote class="layui-elem-quote top-title"><h3><a onclick="history.back()">活动管理</a> / 添加活动</h3></blockquote>
    <form class="layui-form">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="layui-form-item">
            <label class="layui-form-label">主题</label>
            <div class="layui-input-block">
                <input type="text" name="username" lay-verify="username" autocomplete="off" placeholder="请输入主题" class="layui-input" required>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">品牌</label>
            <div class="layui-input-block">
                <input type="text" name="username" lay-verify="username" autocomplete="off" placeholder="请输入品牌" class="layui-input" required>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">车系输出</label>
            <div class="layui-input-block">
                <input type="text" name="username" lay-verify="username" autocomplete="off" placeholder="请输入车系输出" class="layui-input" required>
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">活动说明</label>
            <div class="layui-input-block">
                <textarea name="remark" placeholder="请输入活动说明" class="layui-textarea" required></textarea>
            </div>
        </div>


        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">附件</label>
            <div class="layui-input-block">
                <div class="layui-upload">
                    <button type="button" class="layui-btn layui-btn-normal" id="testList">选择多文件</button>
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
    <script src="{{asset('/wangxun/activity/js/add.js')}}?v=16"></script>

@endsection
