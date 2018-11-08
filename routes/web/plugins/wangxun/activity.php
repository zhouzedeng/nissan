<?php

Route::post('/upload_upload', 'UploadController@upload')->name('upload.upload');
Route::get('/thirdApi_getCouponInfo', 'ThridApiController@getCouponInfo')->name('thirdApi.getCouponInfo');
Route::get('/thirdApi_sendSms', 'ThridApiController@sendSms')->name('thirdApi.sendSms');

Route::group(['middleware' => 'auth_login'], function () {
    Route::get('/home_index', 'HomeController@index')->name('home.index');
    // 活动模块
    Route::get('/activity_index', 'ActivityController@index')->name('activity.index');
    Route::get('/activity_list', 'ActivityController@getList')->name('activity.list');
    Route::get('/activity_add', 'ActivityController@add')->name('activity.add');
    Route::POST('/activity_save', 'ActivityController@save')->name('activity.save');
    Route::POST('/activity_del', 'ActivityController@del')->name('activity.del');
    Route::POST('/activity_edit', 'ActivityController@edit')->name('activity.edit');
    Route::get('/activity_edit', 'ActivityController@edit')->name('activity.edit');
    Route::get('/fing_activity_goods', 'ActivityController@fingActivityGoods')->name('activity.fingActivityGoods');

    // 商品模块
    Route::get('/goods_index', 'GoodsController@index')->name('goods.index');
    Route::get('/goods_list', 'GoodsController@getList')->name('goods.list');
    Route::get('/goods_add', 'GoodsController@add')->name('goods.add');
    Route::POST('/goods_save', 'GoodsController@save')->name('goods.save');
    Route::POST('/goods_del', 'GoodsController@del')->name('goods.del');
    Route::get('/goods_edit', 'GoodsController@edit')->name('goods.edit');
    Route::post('/goods_edit', 'GoodsController@edit')->name('goods.edit');
    Route::get('/find_goods_series', 'GoodsController@findGoodsSeries')->name('goods.find_goods_series');


    // 用户模块
    Route::get('/user_index', 'UserController@index')->name('user.index');
    Route::get('/user_list', 'UserController@getList')->name('user.list');

    // 访客模块
    Route::get('/visitor_index', 'VisitorController@index')->name('visitor.index');
    Route::get('/visitor_list', 'VisitorController@getList')->name('visitor.list');

    // 砍价模块
    Route::get('/cut_index', 'CutController@index')->name('cut.index');
    Route::get('/cut_list', 'CutController@getList')->name('cut.list');
});


Route::group(['middleware' => 'auth_admin'], function () {
    // 审核模块
    Route::get('/verify_index', 'VerifyController@index')->name('verify.index');
    Route::get('/verify_list', 'VerifyController@getList')->name('verify.list');
    Route::post('/verify_check', 'VerifyController@check')->name('verify.check');

    Route::get('/user_allIndex', 'UserController@allIndex')->name('user.allIndex');
    Route::get('/user_allList', 'UserController@allList')->name('user.allList');

    // 访客模块
    Route::get('/visitor_allIndex', 'VisitorController@allIndex')->name('visitor.allIndex');
    Route::get('/visitor_allList', 'VisitorController@allList')->name('visitor.allList');

    // 砍价模块
    Route::get('/cut_allIndex', 'CutController@allIndex')->name('cut.allIndex');
    Route::get('/cut_allList', 'CutController@allList')->name('cut.allList');
});


//Route::group(['middleware' => 'cross'], function () {
    Route::get('/api_adduser', 'ApiController@adduser')->name('api.adduser');
    Route::get('/api_getAllSellerGoods', 'ApiController@getAllSellerGoods')->name('api.getAllSellerGoods');
    Route::get('/api_getaddGoodsToCut', 'ApiController@addGoodsToCut')->name('api.addGoodsToCut');
    Route::get('/api_getCutInfo', 'ApiController@getCutInfo')->name('api.getCutInfo');
    Route::get('/api_getCutVisitor', 'ApiController@getCutVisitor')->name('api.getCutVisitor');
    Route::get('/api_cut', 'ApiController@cut')->name('api.cut');
    Route::get('/thirdApi_getCarSeriesInfo', 'ThridApiController@getCarSeriesInfo')->name('thirdApi.getCarSeriesInfo');
    Route::get('/thirdApi_sendSmsCode', 'ThridApiController@sendSmsCode')->name('thirdApi.sendSmsCode');
    Route::get('/api_getActivity', 'ApiController@getActivity')->name('api.getActivity');
//});




