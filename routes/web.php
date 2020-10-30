<?php

use Illuminate\Support\Facades\Route;

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


Route::get('locale/{lang}/{route}', 'HomeController@lang')->name("locale");

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('website');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

// users

	Route::get('/users', 'UsersController@index')->name('users.index');
	Route::get('/addUser','UsersController@create')->name('users.create');
	Route::post('/addUser','UsersController@store')->name('users.store');
	Route::get('/updateUser/{id}', 'UsersController@edit')->name('users.edit');
	Route::post('/updateUser/{id}', 'UsersController@update')->name('users.update');
	Route::post('/deleteUser/{id}', 'UsersController@destroy')->name('users.destroy');	



// roles

	Route::get('/roles', 'RolesController@index')->name('roles.index');
	Route::get('/addRole','RolesController@create')->name('roles.create');
	Route::post('/addRole','RolesController@store')->name('roles.store');
	Route::get('/updateRole/{id}', 'RolesController@edit')->name('roles.edit');
	Route::post('/updateRole/{id}', 'RolesController@update')->name('roles.update');
	Route::post('/deleteRole/{id}', 'RolesController@destroy')->name('roles.destroy');	

// rolesPermissions

	// Route::post('/addRolePermissions','RolePermissionsController@create')->name('rolePermissions.create');
	Route::get('/updateRolePermissions/{id}', 'RolePermissionsController@edit')->name('rolePermissions.edit');
	Route::post('/updateRolePermissions/{id}', 'RolePermissionsController@update')->name('rolePermissions.update');


