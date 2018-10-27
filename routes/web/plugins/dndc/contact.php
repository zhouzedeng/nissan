<?php

Route::get('/contacts', function () {
    return 'hello world';
});

Route::get('/contact_index', 'ContactController@index');

