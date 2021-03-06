<?php

use Illuminate\Support\Facades\Route;


//Auth::routes();
//Route::prefix('admin')->group(base_path('routes/admin.php'));
//
#Frontend Routes
Route::get('/','HomeController@index')->name('home');
Route::get('/projects', 'ProjectController@index')->name('projects.index');
Route::get('project/category/{slug}','ProjectController@categoryWiseProject')->name('category-wise-project');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});


