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

Route::group(['middleware' => ['auth', 'checkRole:Guru,Kurikulum']], function(){
	Route::get('/dashboard', 'AuthController@dashboard');
	Route::post('/changepass/{id}', 'AkunController@changepass');
});
Route::group(['middleware' => ['auth', 'checkRole:Kurikulum']], function(){
	Route::get('/kelola_akun', 'ViewManagementControl@kelola_akun');
	Route::post('/simpan_akun', 'AkunController@create');
	Route::get('/detail_akun/{id}','AkunController@detail');
	Route::get('/hapus_akun/{id}', 'AkunController@delete');
	Route::post('/update_akun/{id}', 'AkunController@update');
	Route::post('/detail_akun/tambah_kelas', 'AkunController@tambah_kelas');
	Route::get('/detail_akun/hapus_kelas/{id}', 'KelasController@hapus_kelas');
});
Route::group(['middleware' => ['auth', 'checkRole:Guru']], function(){
	Route::get('/kelola_nilai/{kd_guru}', 'NilaiController@dashboard_nilai');
	Route::get('/detail_nilai/{kd_rombel}', 'NilaiController@detail_nilai');
});


// //Login Bawaan
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');