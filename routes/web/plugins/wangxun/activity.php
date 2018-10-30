<?php

// 主页
Route::get('/home_index', 'HomeController@index')->name('home.index');

// 问题模块
Route::get('/question_index', 'QuestionController@index')->name('question.index');
Route::get('/question_list', 'QuestionController@getList')->name('question.list');
Route::get('/question_add', 'QuestionController@add')->name('question.add');


// 第三方接口模块
Route::get('/thirdApi_getCarSeriesInfo', 'ThridApiController@getCarSeriesInfo')->name('thirdApi.getCarSeriesInfo');
Route::get('/thirdApi_getCouponList', 'ThridApiController@getCouponList')->name('thirdApi.getCouponList');
Route::get('/thirdApi_getCouponInfo', 'ThridApiController@getCouponInfo')->name('thirdApi.getCouponInfo');
Route::get('/thirdApi_sendSms', 'ThridApiController@sendSms')->name('thirdApi.sendSms');

