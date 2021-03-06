<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




//Route::get('/home', 'HomeController@index')->name('home');
//
//Route::get('/post/{id}/update', 'HomeController@update');
//
//Route::get('/roles-permissions', 'HomeController@rolesPermissions');

Route::group(['prefix' => 'painel'], function(){

    Route::get('posts', 'painel\PostController@index');

    Route::get('permissions', 'painel\PermissionController@index');
    Route::get('permission/{id}/roles', 'painel\PermissionController@roles');


    Route::get('roles', 'painel\RoleController@index');
    Route::get('role/{id}/permissions', 'painel\RoleController@permissions');

    Route::get('users', 'painel\UserController@index');
    Route::get('user/{id}/roles', 'painel\UserController@roles');


    Route::get('/', 'painel\PainelController@index');

});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'portal\SiteController@index');
