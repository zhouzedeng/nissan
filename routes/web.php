<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('getAccessToken', 'AccessTokenController@getAccessToken')->name('getAccessToken');
Route::get('getCouponList', 'CouponController@getCouponList')->name('getCouponList');



Route::get('/', 'HomeController@index')->name('home.index');
/**********************************  问题模块  ******************************************************/
Route::group(['namespace' => 'Question'], function(){
    Route::get('question/index', 'QuestionController@index')->name('question.index');
    Route::get('question/list', 'QuestionController@getList')->name('question.list');
    Route::get('question/add', 'QuestionController@add')->name('question.add');
    Route::post('question/save', 'QuestionController@save')->name('question.save');
    Route::get('question/export', 'QuestionController@export')->name('question.export');
});

/**********************************  用户模块  ******************************************************/
Route::group(['namespace' => 'User'], function(){
    Route::get('user/index', 'UserController@index')->name('user.index');
    Route::get('user/list', 'UserController@getList')->name('user.list');
    Route::get('user/add', 'UserController@add')->name('user.add');
    Route::post('user/save', 'UserController@save')->name('user.save');
    Route::get('user/export', 'UserController@export')->name('user.export');
});


/**********************************  上传模块  ******************************************************/
Route::group(['namespace' => 'Upload'], function(){
    Route::post('upload', 'UploadController@upload')->name('upload');
});
