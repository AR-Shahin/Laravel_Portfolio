<?php
use Illuminate\Support\Facades\Route;
#Backend Routes
Route::get('/ar_admin', 'Auth\LoginController@showLoginForm')->name('login');

#Dashboard Routes
Route::get('/dashboard', 'Admin\AdminController@index')->name('dashboard');

#AboutText Routes
Route::name('about-text.')->namespace('Admin')->prefix('about')->group(function(){
    Route::get('/index','AboutTextController@index')->name('index');
    Route::get('get-category','AboutTextController@fetchAboutText')->name('fetch');
    Route::post('/store', 'AboutTextController@store')->name('store');
    Route::put('/update', 'AboutTextController@update')->name('update');
});

#AboutSlider Routes
Route::name('about-slider.')->namespace('Admin')->prefix('about-slider')->group(function(){
    Route::get('/index','AboutSliderController@index')->name('index');
    Route::get('get-slider','AboutSliderController@fetchAboutSlider')->name('fetch');
    Route::post('/store', 'AboutSliderController@store')->name('store');
    Route::put('/status-active', 'AboutSliderController@statusActive')->name('status.active');
    Route::put('/status-inactive', 'AboutSliderController@statusInActive')->name('status.inactive');
    Route::delete('/delete', 'AboutSliderController@destroy')->name('destroy');
    Route::get('/edit', 'AboutSliderController@edit')->name('edit');
    Route::post('/update', 'AboutSliderController@update')->name('update');
});

#Category Routes
Route::name('category.')->namespace('Admin')->prefix('category')->group(function(){
    Route::get('/index','CategoryController@index')->name('index');
    Route::get('get-category','CategoryController@getAllCategory')->name('fetch');
    Route::delete('/delete', 'CategoryController@destroy')->name('destroy');
    Route::post('/store', 'CategoryController@store')->name('store');
    Route::get('/edit', 'CategoryController@edit')->name('edit');
    Route::put('/update', 'CategoryController@update')->name('update');
});

#Site Identity Routes
Route::name('site-identity.')->namespace('Admin')->prefix('site')->group(function(){
    Route::get('/index','SiteIdentityController@index')->name('index');
    Route::get('get-site-identity','SiteIdentityController@fetchSiteIdentity')->name('fetch');
    Route::post('/store', 'SiteIdentityController@store')->name('store');
    Route::post('/update', 'SiteIdentityController@update')->name('update');
});

#Social Link Routes
Route::name('social-link.')->namespace('Admin')->prefix('link')->group(function(){
    Route::get('/index','SocialLinksController@index')->name('index');
    Route::get('get-site-identity','SocialLinksController@fetchSocialLinks')->name('fetch');
    Route::post('/store', 'SocialLinksController@store')->name('store');
    Route::post('/update', 'SocialLinksController@update')->name('update');
});

#Programming Routes
Route::name('programming.')->namespace('Admin')->prefix('programming')->group(function(){
    Route::get('/index','ProgrammingController@index')->name('index');
    Route::get('get-programming','ProgrammingController@getAllProgrammingCode')->name('fetch');
    Route::delete('/delete', 'ProgrammingController@destroy')->name('destroy');
    Route::post('/store', 'ProgrammingController@store')->name('store');
    Route::get('/edit', 'ProgrammingController@edit')->name('edit');
    Route::put('/update', 'ProgrammingController@update')->name('update');
});


#Gallery Routes
Route::name('gallery.')->namespace('Admin')->prefix('gallery')->group(function(){
    Route::get('/index','GalleryController@index')->name('index');
    Route::get('get-slider','GalleryController@fetchGalleryPhoto')->name('fetch');
    Route::post('/store', 'GalleryController@store')->name('store');
    Route::put('/status-active', 'GalleryController@statusActive')->name('status.active');
    Route::put('/status-inactive', 'GalleryController@statusInActive')->name('status.inactive');
    Route::delete('/delete', 'GalleryController@destroy')->name('destroy');
    Route::get('/edit', 'GalleryController@edit')->name('edit');
    Route::post('/update', 'GalleryController@update')->name('update');
});

#Project Routes
Route::name('project.')->namespace('Admin')->prefix('project')->group(function(){
    Route::get('/index','ProjectController@index')->name('index');
    Route::get('get-slider','ProjectController@fetchAllProjects')->name('fetch');
    Route::post('/store', 'ProjectController@store')->name('store');
    Route::put('/status-active', 'ProjectController@statusActive')->name('status.active');
    Route::put('/status-inactive', 'ProjectController@statusInActive')->name('status.inactive');
    Route::delete('/delete', 'ProjectController@destroy')->name('destroy');
    Route::get('/view', 'ProjectController@view')->name('view');
    Route::get('/edit', 'ProjectController@edit')->name('edit');
    Route::post('/update', 'ProjectController@update')->name('update');


});