<?php

use Illuminate\Support\Facades\Route;

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

Route::domain(env('APP_DOMAIN'))->group(function () {
    Route::get('/', 'PageController@index');
    Route::get('/posts', 'PageController@posts');
    Route::get('/contact', 'PageController@contact');
    Route::get('/aboutUs', 'PageController@aboutUs');
    Route::get('/concepts', 'PageController@concepts');
    Route::get('/groups', 'PageController@groups');
    Route::get('/posts/{post}','PageController@post');
    Route::get('/changeLocale/{locale}', 'PageController@changeLocale');
    Route::get('/search', 'PageController@search');
    Route::get('/tbd', 'PageController@tbd');
});

foreach (\File::allFiles(__DIR__ . "/web") as $routeFile) {
    include $routeFile;
}
Route::get('/home', 'HomeController@index')->name('home');
