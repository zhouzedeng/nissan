<?php

// 控制器在 App\Http\Controllers\Admin命名空间下
Route::group(['namespace' => 'Admin'], function() {
    Route::get('', 'HomeController@index')->name('home.index');

    Route::get('/activity_index', 'ActivityController@index')->name('activity.index');
    Route::get('/activity_list', 'ActivityController@getList')->name('activity.list');
    Route::get('/activity_add', 'ActivityController@add')->name('activity.add');
    Route::POST('/activity_save', 'ActivityController@save')->name('activity.save');
    Route::POST('/activity_del', 'ActivityController@del')->name('activity.del');
    Route::POST('/activity_edit', 'ActivityController@edit')->name('activity.edit');
    Route::get('/activity_edit', 'ActivityController@edit')->name('activity.edit');
    Route::get('/fing_activity_goods', 'ActivityController@fingActivityGoods')->name('activity.fingActivityGoods');

    Route::get('/goods_index', 'GoodsController@index')->name('goods.index');
    Route::get('/goods_list', 'GoodsController@getList')->name('goods.list');
    Route::get('/goods_add', 'GoodsController@add')->name('goods.add');
    Route::POST('/goods_save', 'GoodsController@save')->name('goods.save');
    Route::POST('/goods_del', 'GoodsController@del')->name('goods.del');
    Route::get('/goods_edit', 'GoodsController@edit')->name('goods.edit');
    Route::post('/goods_edit', 'GoodsController@edit')->name('goods.edit');
    Route::get('/find_goods_series', 'GoodsController@findGoodsSeries')->name('goods.find_goods_series');
});

// 控制器在 App\Http\Controllers\Api命名空间下
Route::group(['namespace' => 'Api'], function() {
    Route::any('/wechat', 'WeChatController@serve');
    Route::any('/oauth2', 'WeChatController@oauth2');

});

// 控制器在 App\Http\Controllers\Api命名空间下
Route::group(['namespace' => 'Comm'], function() {
    Route::post('upload_upload', 'UploadController@upload')->name('upload');
});






















