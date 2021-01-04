<?php
use Illuminate\Support\Facades\Route;
#Backend Routes
Route::get('/ar_admin', 'Auth\LoginController@showLoginForm')->name('login');

#Dashboard Routes
Route::get('/dashboard', 'Admin\AdminController@index')->name('dashboard');

#Category Routes
Route::name('category.')->prefix('category')->group(function(){

    Route::get('/index','Admin\CategoryController@index')->name('index');
    Route::get('get-category','Admin\CategoryController@getAllCategory')->name('fetch');
    Route::delete('/delete', 'Admin\CategoryController@destroy')->name('destroy');
    Route::post('/store', 'Admin\CategoryController@store')->name('store');
    Route::get('/status-active', 'Admin\CategoryController@makeActive')->name('status.active');
    Route::get('/status-inactive', 'Admin\CategoryController@makeInactive')->name('status.inactive');

    Route::get('/edit', 'Admin\CategoryController@edit')->name('edit');
    Route::post('/update', 'Admin\CategoryController@update')->name('update');
});

