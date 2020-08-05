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

Auth::routes();

Route::get('/exit' , function (){\Illuminate\Support\Facades\Auth::logout();
    return redirect() -> route('login');
})->name('log_out');

Route::group(['prefix' => 'panel' , 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('CMS.home');
    })->name('CMS.home');

    Route::group(['prefix' => 'news'], function () {
        Route::get('/','CMS\newsController@index')->name('CMS.news.list');
        Route::get('/create','CMS\newsController@create')->name('CMS.news.create');
        Route::post('/create_post' , 'CMS\newsController@create_post')-> name('CMS.news.create_post');
        Route::get('/remove/{id}' , 'CMS\newsController@remove')-> name('CMS.news.remove');
        Route::get('/edit/{id}' , 'CMS\newsController@edit')->name('CMS.news.edit');
        Route::post('/edit_post/{id}', 'CMS\newsController@edit_post')->name('CMS.news.edit_post');
    });


});
