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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', 'Admin\AdminController@index')->middleware('is_admin')->name('admin');
Route::resource('admin/roles', 'Admin\RolesController')->middleware('is_admin');
Route::resource('admin/permissions', 'Admin\PermissionsController')->middleware('is_admin');
Route::resource('admin/users', 'Admin\UsersController')->middleware('is_admin');
Route::resource('admin/pages', 'Admin\PagesController')->middleware('is_admin');
Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
    'index', 'show', 'destroy'
])->middleware('is_admin');
Route::resource('admin/settings', 'Admin\SettingsController')->middleware('is_admin');
Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator'])->middleware('is_admin');
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator'])->middleware('is_admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
