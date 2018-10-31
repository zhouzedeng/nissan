<?php

// 主页
Route::get('/home_index', 'HomeController@index')->name('home.index');

// 问题模块
Route::get('/activity_index', 'ActivityController@index')->name('activity.index');
Route::get('/activity_list', 'ActivityController@getList')->name('activity.list');
Route::get('/activity_add', 'ActivityController@add')->name('activity.add');

// 上传模块
Route::post('/upload_upload', 'UploadController@upload')->name('upload.upload');


// 第三方接口模块
Route::get('/thirdApi_getCarSeriesInfo', 'ThridApiController@getCarSeriesInfo')->name('thirdApi.getCarSeriesInfo');
Route::get('/thirdApi_getCouponList', 'ThridApiController@getCouponList')->name('thirdApi.getCouponList');
Route::get('/thirdApi_getCouponInfo', 'ThridApiController@getCouponInfo')->name('thirdApi.getCouponInfo');
Route::get('/thirdApi_sendSms', 'ThridApiController@sendSms')->name('thirdApi.sendSms');

