<?php

use Illuminate\Support\Facades\Route;

//User Routes
Route::namespace('User')->group(function() {
    Route::get('/','HomeController@index')->name('home-page');
    Route::get('post/{post}','PostController@post')->name('post');

    Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
    Route::get('post/category/{category}','HomeController@category')->name('category');
    
});//end of user group routes


//Admin Routes
Route::group(['namespace'=>'Admin'],function () {
    
    Route::get('admin/home', 'HomeController@index')->name('admin.home');

    //Post Routes
    Route::resource('admin/post', 'PostController');

    //User Routes
    Route::resource('admin/user', 'UserController');

    //Roles Routes
    Route::resource('admin/role', 'RoleController');

    //Permissions Routes
    Route::resource('admin/permission', 'PermissionController');

    //Tag Routes
    Route::resource('admin/tag', 'TagController');

    //Category Routes
    Route::resource('admin/category', 'CategoryController');

    //Admin Auth Routes
    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\LoginController@login');

});//end of admin group routes

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
