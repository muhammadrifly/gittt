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
    return view('home');
});

Route::resource('kriteria', 'kriteriaController');
Route::resource('data-ca', 'admin\\calonAnggotaController');
Route::resource('kriteria', 'admin\\kriteriaController');
Route::resource('subkriteria', 'admin\\subKriteriaController');
Route::resource('nilai', 'admin\\nilaiController');
Route::resource('sample', 'admin\\sampleController');
Route::resource('reset', 'admin\\updatePasswordController');

Route::post('/login', 'Login@login');
Route::get('/logout', 'Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('updatepassword','Login@update');
