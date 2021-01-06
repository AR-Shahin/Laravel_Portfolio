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
    Route::put('/update', 'AboutTextController@update')->name('update');
});

#Social Link Routes
Route::name('social-link.')->namespace('Admin')->prefix('link')->group(function(){
    Route::get('/index','SocialLinksController@index')->name('index');
    Route::get('get-site-identity','SocialLinksController@fetchSocialLinks')->name('fetch');
    Route::post('/store', 'SocialLinksController@store')->name('store');
    Route::put('/update', 'SocialLinksController@update')->name('update');
});