<?php


Route::get('/question_index', 'QuestionController@index')->name('question.index');
Route::get('/question_list', 'QuestionController@getList')->name('question.list');

Route::get('/home_index', 'HomeController@index')->name('home.index');