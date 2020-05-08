<?php
Route::domain('admin.' . env('APP_DOMAIN'))->group(function () {
    Auth::routes(['register' => 'false']);
    Route::middleware('auth')->get('datatable/list', '\ElCoop\Datatable\Controllers\DatatableController@list');
    Route::namespace('Admin')->middleware('auth')->group(function () {
        Route::get('/', function (){
            return redirect()->action('Admin\PostController@index');
        });
        Route::group(['prefix' => 'content'], function () {
            Route::get('/', 'ContentController@show');
            Route::patch('/', 'ContentController@update');
        });
        Route::group(['prefix' => 'posts'], function () {
            Route::get('/newPost', 'PostController@showNew');
            Route::post('/newPost/create', 'PostController@create');
            Route::get('/', 'PostController@index');
            Route::get('/{post}', 'PostController@show');
            Route::patch('/updatePost/{post}', 'PostController@update');
            Route::delete('/delete/{post}', 'PostController@delete');

        });
    });

});

