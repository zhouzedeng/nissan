@extends('layouts.app')

@section('content')
    <!-- 面板 -->
    <blockquote class="layui-elem-quote top-title"><h3><a onclick="history.back()">商品管理</a> / 添加商品</h3></blockquote>
    <form class="layui-form">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="layui-form-item">
            <label class="layui-form-label">商品名称</label>
            <div class="layui-input-block">
                <input type="text" name="name" lay-verify="name" autocomplete="off" placeholder="请输入主题" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">商品价格</label>
            <div class="layui-input-block">
                <input type="text" name="price" lay-verify="price" autocomplete="off" placeholder="请输入品牌" class="layui-input" >
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">卡券ID</label>
            <div class="layui-input-block">
                <input type="text" name="coupon_id" lay-verify="coupon_id" autocomplete="off" placeholder="请输入品牌" class="layui-input" >
            </div>
        </div>

        <input id="img" type="hidden" name="img" lay-verify="img">

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">商品图片</label>
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
    <script src="{{asset('/wangxun/goods/js/add.js')}}?v=19000"></script>

@endsection
