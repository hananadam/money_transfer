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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('users', 'App\Http\Controllers\UserController', ['except' => ['show']]);

	Route::resource('roles', 'App\Http\Controllers\RolesController', ['except' => ['show']]);

	Route::get('/updateRolePermissions/{id}', 'App\Http\Controllers\RolePermissionsController@edit')->name('rolePermissions.edit');
	Route::put('/updateRolePermissions/{id}', 'App\Http\Controllers\RolePermissionsController@update')->name('rolePermissions.update');


	Route::resource('companies', 'App\Http\Controllers\CompaniesController', ['except' => ['show']]);
	Route::resource('agencies', 'App\Http\Controllers\AgenciesController');
	Route::resource('branches', 'App\Http\Controllers\BranchesController');
	Route::resource('currency', 'App\Http\Controllers\CurrencyController');


	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);

	

});


