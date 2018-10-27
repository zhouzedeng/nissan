<?php

/**********************************  用户模块  ******************************************************/
Route::get('/user_index', 'UserController@index')->name('user.index');
Route::get('/user_list', 'UserController@getList')->name('user.list');
Route::get('/user_add', 'UserController@add')->name('user.add');
Route::post('/user_save', 'UserController@save')->name('user.save');
Route::get('/user_export', 'UserController@export')->name('user.export');

