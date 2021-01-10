<?php

use Illuminate\Support\Facades\Route;


//Auth::routes();
//Route::prefix('admin')->group(base_path('routes/admin.php'));
//
#Frontend Routes
Route::get('/','HomeController@index')->name('home');
Route::get('/projects', 'ProjectController@index')->name('projects.index');
Route::get('category/{slug}','ProjectController@categoryWiseProject')->name('category-wise-project');


