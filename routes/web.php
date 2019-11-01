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


Route::get('/', 'Auth\GithubLoginController@index')->name('login');
Route::post('logout', 'Auth\LogoutController@logoutUser')->name('logout');
Route::get('login/github', 'Auth\GithubLoginController@redirectToProvider')->name('github.login');
Route::get('login/github/callback', 'Auth\GithubLoginController@handleProviderCallback')->name('github.callback');;


// App
Route::get('home', 'HomeController@index')->name('home')->middleware(['auth', 'ban']);
Route::get('home/dl', 'HomeController@downloadZip')->name('home.dl')->middleware(['auth', 'ban']);

Route::resource('tests', 'TestController')->middleware(['auth', 'ban']);


// Admin
Route::get('approuver/{test}', 'ApprouverTestController@approuver')->name('approuver')->middleware(['admin', 'ban']);

Route::get('admin', 'AdminController@index')->name('admin.index')->middleware(['admin', 'ban']);
Route::get('admin/generer', 'AdminController@genererCode')->name('admin.generer')->middleware(['admin', 'ban']);

Route::get('users', 'UserController@index')->name('users.index')->middleware(['auth', 'ban']);
Route::get('users/{user}/toggle-role', 'UserController@toggleAdmin')->name('users.admin')->middleware(['admin', 'ban']);
Route::get('users/{user}/bannir', 'UserController@toggleBannir')->name('users.bannir')->middleware(['admin', 'ban']);

