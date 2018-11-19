@extends('layouts.app')

@section('content')
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>个人主页</legend>
    </fieldset>
    <div class="layui-col-md6">
        <div class="layui-card">
       {{--  <div class="layui-card-header">经销商：{{$user_info['seller_name']}}</div>
            <div class="layui-card-header">账户：{{$user_info['user_name']}}</div>
            <div class="layui-card-header">经销商ID：{{$user_info['seller']['sellerId']}}</div>
            <div class="layui-card-header">会员编码：{{$user_info['seller']['memberId']}}</div>
            <div class="layui-card-header">是否管理员：@if ($user_info['seller']['isAdmin'] == 1) 管理员 @else 非管理员 @endif</div>
            <div class="layui-card-header">是否自营：@if ($user_info['is_own_shop'] == 1) 自营 @else 非自营 @endif</div>
            <div class="layui-card-header">门店编号：{{$user_info['store_id']}}</div>
            <div class="layui-card-header">门店名称：{{$user_info['store_name']}}</div>--}}
        </div>
    </div>
@endsection
