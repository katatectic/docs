<?php

Route::get('/', 'IndexController@index');

Auth::routes();

Route::resource('document', 'DocumentController');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', 'DocumentController@indexAdmin')->name('admin');
    Route::delete('/document/{document}/file/{file}/destroy', 'DocumentController@destroyFile')->name('file.destroy');
});

