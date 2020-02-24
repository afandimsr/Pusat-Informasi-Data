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
    return view('index');
});

Auth::routes();
// Auth::routes(['register' => false]);
// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/pendidikan','PendidikanController@index')->name('pendidikan');

Route::get('/education','HomeController@education_show')->name('edu_show');
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/','AdminController@redirectTo')->name('s_admin');
    Route::get('/dasboard','AdminController@index')->name('dasboard');
    Route::get('/education/add','PendidikanController@cd_pendidikan')->name('edu_add');
    Route::get('/kesehatan/add','KesehatanController@cd_kesehatan')->name('k_kes_add');
    Route::get('/kependudukan/add','KependudukanController@cd_kependudukan')->name('kep_pend_add');
    Route::get('/lingkunganHidup/add','LingkunganHidupController@cd_lingkunganHidup')->name('lh_lingkungan_add');
    Route::get('/pariwisata/add','PariwisataController@cd_pariwisata')->name('par_pariwisata_add');
    Route::get('/pariwisata/add','PekerjaanUmumController@cd_pekerjaanUmum')->name('pek_pekerjaan_umum_add');
    Route::get('/penanggulanganBencana/add','PenanggulanganBencanaController@cd_penanggulangan_bencana')->name('pen_penanggulangan_bencana_add');
    Route::resource('/education','PendidikanController');
    Route::resource('/kesehatan','KesehatanController');
    Route::resource('/kependudukan','KependudukanController');
    Route::resource('/lingkunganHidup','LingkunganHidupController');
    Route::resource('/pariwisata','PariwisataController');
    Route::resource('/pekerjaanUmum','PekerjaanUmumController');
    Route::resource('/penanggulanganBencana','PenanggulanganBencanaController');
    Route::resource('/restrict','KecamatanController');
    Route::resource('/users','UserController',['except'=> ['show','store'] ]);

});