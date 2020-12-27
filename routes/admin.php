<?php

#Backend Routes
Route::get('/ar_admin', 'Auth\LoginController@showLoginForm')->name('login');

#Dashboard Routes
Route::get('/dashboard', 'Admin\AdminController@index')->name('dashboard');

#Category Routes
Route::get('category/index','Admin\CategoryController@index')->name('category.index');
Route::get('get-category','Admin\CategoryController@getAllCategory')->name('get.category');
Route::delete('category/delete', 'Admin\CategoryController@destroy')->name('category.destroy');
Route::post('/category/store', 'Admin\CategoryController@store')->name('category.store');
Route::get('/category/status-active', 'Admin\CategoryController@makeActive')->name('category.status.active');
Route::get('/category/status-inactive', 'Admin\CategoryController@makeInactive')->name('category.status.inactive');

Route::get('/category/edit', 'Admin\CategoryController@edit')->name('category.edit');
Route::post('/category/update', 'Admin\CategoryController@update')->name('category.update');
