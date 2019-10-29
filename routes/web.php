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

Route::get('/', function () {
    return view('github.login');
});

Route::get('home', 'HomeController@index')->name('home');
Route::get('home/dl', 'HomeController@downloadZip')->name('home.dl');

Route::resource('tests', 'TestController');

Route::get('admin', 'AdminController@index')->name('admin.index');
Route::get('admin/generer', 'AdminController@genererCode')->name('admin.generer');



Route::get('login/github', 'Auth\GithubLoginController@redirectToProvider')->name('github.login');
Route::get('login/github/callback', 'Auth\GithubLoginController@handleProviderCallback')->name('github.callback');;
