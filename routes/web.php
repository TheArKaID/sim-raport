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
    return view('welcome');
});

Route::get('/login', 'AuthController@index')->name('login');
Route::get('/logout', 'AuthController@logout');
Route::post('/postlogin', 'AuthController@postlogin');
Route::group(['middleware' => ['auth', 'checkRole:Kurikulum']], function(){
	Route::get('/kelola_akun', 'ViewManagementControl@kelola_akun');
	Route::post('/simpan_akun', 'AkunController@create');
	Route::get('/hapus_akun/{user}', 'AkunController@delete');
	Route::get('/detail_akun','AkunController@detail');
});
Route::group(['middleware' => ['auth', 'checkRole:Guru,Kurikulum']], function(){
	Route::get('/dashboard', 'AuthController@dashboard');
});



// //Login Bawaan
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

