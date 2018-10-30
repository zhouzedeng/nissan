<?php

Route::get('/contacts', function () {
    return 'contact';
});

Route::get('/contact_index', 'ContactController@index');

