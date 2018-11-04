<?php
// 主页
Route::get('/home_index', 'HomeController@index')->name('home.index');

// 活动模块
Route::get('/activity_index', 'ActivityController@index')->name('activity.index');
Route::get('/activity_list', 'ActivityController@getList')->name('activity.list');
Route::get('/activity_add', 'ActivityController@add')->name('activity.add');
Route::POST('/activity_save', 'ActivityController@save')->name('activity.save');
Route::POST('/activity_del', 'ActivityController@del')->name('activity.del');
Route::POST('/activity_edit', 'ActivityController@edit')->name('activity.edit');
Route::get('/activity_edit', 'ActivityController@edit')->name('activity.edit');

// 商品模块
Route::get('/goods_index', 'GoodsController@index')->name('goods.index');
Route::get('/goods_list', 'GoodsController@getList')->name('goods.list');
Route::get('/goods_add', 'GoodsController@add')->name('goods.add');
Route::POST('/goods_save', 'GoodsController@save')->name('goods.save');
Route::POST('/goods_del', 'GoodsController@del')->name('goods.del');
Route::get('/goods_edit', 'GoodsController@edit')->name('goods.edit');
Route::post('/goods_edit', 'GoodsController@edit')->name('goods.edit');




// 上传模块
Route::post('/upload_upload', 'UploadController@upload')->name('upload.upload');

// 第三方接口模块
Route::get('/thirdApi_getCarSeriesInfo', 'ThridApiController@getCarSeriesInfo')->name('thirdApi.getCarSeriesInfo');
Route::get('/thirdApi_getCouponInfo', 'ThridApiController@getCouponInfo')->name('thirdApi.getCouponInfo');
Route::get('/thirdApi_sendSms', 'ThridApiController@sendSms')->name('thirdApi.sendSms');

