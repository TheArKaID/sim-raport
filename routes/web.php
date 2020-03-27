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

//------------------------------------------------------------
// 					Akses Umum Sebelum Login
//------------------------------------------------------------
Route::get('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout');
Route::post('/verif_login', 'AuthController@verif_login');
Route::post('/first_account', 'AuthController@first_account');

Route::group(['middleware' => ['auth', 'checkRole:Guru,Kurikulum']], function(){
	//------------------------------------------------------------
	// 					Akses Umum Setelah Login
	//------------------------------------------------------------
	Route::get('/dashboard', 'KelolaDashboardController@dashboard');
	Route::get('/profile', 'KelolaProfileController@profile');
	Route::post('/update_profile/{id}/{kd_guru}', 'KelolaAkunController@update_profile');
	Route::post('/changepass/{id}', 'KelolaAkunController@changepass');
});

Route::group(['middleware' => ['auth', 'checkRole:Kurikulum']], function(){
	//------------------------------------------------------------
	//                    Kelola Akun
	//------------------------------------------------------------
	Route::get('/kelola_akun', 'KelolaAkunController@kelola_akun');
	Route::post('/simpan_akun', 'KelolaAkunController@simpan_akun');
	Route::post('/update_akun/{id}/{kd_guru}', 'KelolaAkunController@update_akun');
	Route::get('/detail_akun/{id}','KelolaAkunController@detail_akun');
	Route::get('/hapus_akun/{kd_guru}', 'KelolaAkunController@hapus_akun');
	//------------------------------------------------------------
	// 					Kelola Kelas Ajar
	//------------------------------------------------------------
	Route::get('/kelasAjar/{id}', 'KelolaKelasAjarController@t_kelas_ajar');
	Route::post('/simpan_kelas', 'KelolaKelasAjarController@simpan_kelas');
	Route::get('/hapus_kelas/{id}/{kd_guru}', 'KelolaKelasAjarController@hapus_kelas');
	//------------------------------------------------------------
	// 					Kelola Data
	//------------------------------------------------------------
	Route::get('/kelola_rombel', 'KelolaRombelController@kelola_rombel');
	Route::get('/tambah_rombel/{s_jur}/{tingkat}/{tingkat_r}', 'KelolaRombelController@tambah_rombel');
	Route::get('/hapus_rombel/{id}', 'KelolaRombelController@hapus_rombel');
	Route::get('/kelola_rayon', 'KelolaRayonController@kelola_rayon');
	Route::post('/tambah_rayon/{ray}/{daerah}', 'KelolaRayonController@tambah_rayon');
	Route::get('/hapus_rayon/{id}', 'KelolaRayonController@hapus_rayon');
	Route::get('/kelola_siswa', 'KelolaSiswaController@kelola_siswa');
	Route::post('/tambah_siswa', 'KelolaSiswaController@tambah_siswa');
	Route::get('/edit_siswa/{id}', 'KelolaSiswaController@edit_siswa');
	Route::post('/update_siswa/{id}', 'KelolaSiswaController@update_siswa');
	Route::get('/hapus_siswa/{id}', 'KelolaSiswaController@hapus_siswa');
	Route::post('/import_siswa', 'KelolaSiswaController@import_siswa');
	Route::post('/simpan_mapel', 'KelolaMapelController@simpan_mapel');
	Route::get('/hapus_mapel/{id}', 'KelolaMapelController@hapus_mapel');
	Route::get('/select_mapel', 'KelolaMapelController@selectMapel');
	Route::get('/maksKodeMapel', 'KelolaMapelController@maksKodeMapel');
	Route::get('/tabelMapel', 'KelolaMapelController@tabelMapel');
	//------------------------------------------------------------
	// 					Kelola Raport
	//------------------------------------------------------------
	Route::get('/kelola_raport', 'KelolaRaportController@kelola_raport');
	Route::get('/tabel_rayon_raport', 'KelolaRaportController@tabel_rayon');
	Route::get('/sort_rayon_raport/{daerah}', 'KelolaRaportController@sort_rayon');
	Route::get('/kelola_raport/data_siswa/{kd_rayon}', 'KelolaRaportController@data_siswa');
	Route::get('/kelola_raport/data_siswa/{kd_rayon}/{nis}', 'KelolaRaportController@detail_siswa');
	Route::get('/kelola_raport/cetak_raport/{ulangan}/{kd_rayon}/{nis}', 'KelolaRaportController@cetak_raport');
	Route::get('/kelola_raport/raport_view/{nis}/{ulangan}/{senbud}/{upd}/{pramuka}/{sikap}', 'KelolaRaportController@raport_view');
	//------------------------------------------------------------
	// 					    Tahun Ajar
	//------------------------------------------------------------
	Route::get('/tahun_ajaran', 'KelolaTahunAjarController@tahun_ajar');
	Route::get('/eksport_data', 'KelolaTahunAjarController@eksport_data');

});

Route::group(['middleware' => ['auth', 'checkRole:Guru']], function(){
	//------------------------------------------------------------
	// 					Kelola Nilai Siswa
	//------------------------------------------------------------
	Route::get('/kelola_nilai', 'KelolaNilaiController@dashboard_nilai');
	Route::get('/detail_nilai/{kd_rombel}', 'KelolaNilaiController@detail_nilai');
	Route::get('/edit_nilai/{semes}/{field}/{kd_mapel}/{nis}/{value}/{kd_rombel}', 'KelolaNilaiController@edit_nilai');
	//------------------------------------------------------------
	// 				  Kelola Nilai KKM Siswa
	//------------------------------------------------------------
	Route::post('/tambah_kkm/{kd_rombel}', 'KelolaNilaiController@tambah_kkm');
	Route::post('/edit_kkm/{kd_rombel}', 'KelolaNilaiController@edit_kkm');
});