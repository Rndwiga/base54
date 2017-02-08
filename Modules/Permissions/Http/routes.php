<?php

Route::group(['middleware' => 'web', 'prefix' => 'permissions', 'namespace' => 'Modules\Permissions\Http\Controllers'], function()
{
   // Route::get('/', 'PermissionsController@index');
    Route::get('display/role/form', 'AuthenticateController@displayRolesForm')->name('roles.form');
    Route::post('display/role/form', 'AuthenticateController@createRole')->name('roles.form.create');
    Route::post('create/group', 'AuthenticateController@createPermissionGroup')->name('permissions.group.create');
    Route::post('create/permission', 'AuthenticateController@createPermission')->name('permissions.create');
    Route::get('display/permission/form', 'AuthenticateController@displayGroupPermissionForm')->name('permissions.form');
});
