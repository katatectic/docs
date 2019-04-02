<?php

Route::get('/', 'IndexController@index');

Auth::routes();

Route::resource('document', 'DocumentController');

Route::get('/admin', 'DocumentController@indexAdmin')->name('admin');

