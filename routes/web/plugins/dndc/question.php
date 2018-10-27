<?php

/**********************************  问题模块  ******************************************************/
Route::get('/question_index', 'QuestionController@index')->name('question.index');
Route::get('/question_list', 'QuestionController@getList')->name('question.list');
Route::get('/question_add', 'QuestionController@add')->name('question.add');
Route::post('/question_save', 'QuestionController@save')->name('question.save');
Route::get('/question_export', 'QuestionController@export')->name('question.export');
