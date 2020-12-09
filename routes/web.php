<?php

use Illuminate\Support\Facades\Route;


//Auth::routes();

#Frontend Routes
Route::get('/','HomeController@index')->name('home');
Route::get('/projects', 'ProjectController@index')->name('projects.index');

#Backend Routes
Route::get('/ar_admin', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/dashboard', 'Admin\AdminController@index')->name('dashboard');

