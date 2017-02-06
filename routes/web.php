<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
//Route::get('/minor', 'HomeController@minor')->name("minor");
//Route::get('/portal', 'HomeController@index');


Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');
Route::resource('admin/users', 'Admin\UsersController');
Route::resource('admin/profile', 'Admin\UserProfileController');
Route::patch('/admin/users/changePassword/{user}', 'Admin\UsersController@changePassword');
Route::get('/home', 'HomeController@index');
