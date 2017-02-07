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



Route::group(['middleware' => ['auth']], function () {
    Route::resource('admin/roles', 'Admin\UserProfileController');
    Route::patch('/admin/users/changePassword/{user}', 'Admin\UsersController@changePassword');
    Route::get('/home', 'HomeController@index');
    Route::resource('admin/users', 'Admin\UsersController');

    Route::post('admin/acl', 'Admin\ACL\AuthenticateController@createRole');
    Route::post('admin/acl/group', 'Admin\ACL\AuthenticateController@createPermissionGroup');
    Route::post('admin/acl/permission', 'Admin\ACL\AuthenticateController@createPermission');
    Route::get('admin/permissions/create', 'Admin\ACL\AuthenticateController@displayGroupPermissionForm');
});

Route::group(['middleware' => ['role:admin,access_backend']], function () {

});