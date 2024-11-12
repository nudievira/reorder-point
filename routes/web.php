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
Route::get('/login', function () {
    return view('auth/login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {

  Route::get('/', function () {
      return view('home');
  });

  Route::get('cari','CariController@index')->name('cari.index');

  Route::get('/home', 'HomeController@index')->name('home');

  Route::resource('levelpengguna','LevelPenggunaController');
  Route::resource('pengguna','PenggunaController');

  Route::patch('ubahpassword/{id}','UbahPasswordController@update')->name('ubahpassword.update');
  Route::get('ubahpassword','UbahPasswordController@index')->name('ubahpassword.index');

  Route::get('resetpassword','ResetPasswordController@index')->name('resetpassword.index');
  Route::post('resetpassword/{id}','ResetPasswordController@reset')->name('resetpassword.reset');

  Route::patch('profil/updatepicture/{id}','ProfilController@updatepicture')->name('profil.updatepicture');
  Route::patch('profil/updatepassword/{id}','ProfilController@updatepassword')->name('profil.updatepassword');
  Route::patch('profil/updateprofil/{id}','ProfilController@updateprofil')->name('profil.updateprofil');
  Route::get('profil','ProfilController@index')->name('profil.index');

  // Route::get('jenisbarang','JenisBarangController@index')->name('jenisbarang.index');
  // Route::get('jenisbarang/create','JenisBarangController@create')->name('jenisbarang.create');
  // Route::post('jenisbarang/store','JenisBarangController@store')->name('jenisbarang.store');
  // Route::get('jenisbarang/edit','JenisBarangController@edit')->name('jenisbarang.edit');
  // Route::post('jenisbarang/destroy','JenisBarangController@destroy')->name('jenisbarang.destroy');

  Route::resource('jenisbarang','JenisBarangController');
  Route::resource('satuanbarang','SatuanBarangController');
  Route::resource('barang','BarangController');
  Route::resource('supplier','SupplierController');

  Route::resource('saftystock','SaftyStockController');

  Route::resource('rop','ROPController');

  // Route::get('pesan/cetak/{pesan}', 'PesanController@cetak')->name('pesan.cetak');
  Route::post('pesan/deleteDetail', 'PesanController@deleteDetail')->name('pesan.deleteDetail');
  Route::get('pesan/getDataBarang/{pesan}', 'PesanController@getDataBarang')->name('pesan.getDataBarang');
  Route::get('pesan/getDetail/{pesan}', 'PesanController@getDetail')->name('pesan.getDetail');
  Route::resource('pesan','PesanController');

  // Route::get('terima/cetak/{terima}', 'TerimaController@cetak')->name('terima.cetak');
  Route::post('terima/deleteDetail', 'TerimaController@deleteDetail')->name('terima.deleteDetail');
  Route::get('terima/getDataBarang/{terima}', 'TerimaController@getDataBarang')->name('terima.getDataBarang');
  Route::get('terima/getDetail/{terima}', 'TerimaController@getDetail')->name('terima.getDetail');
  Route::resource('terima','TerimaController');

  // Route::get('jual/cetak/{jual}', 'JualController@cetak')->name('jual.cetak');
  Route::post('jual/deleteDetail', 'JualController@deleteDetail')->name('jual.deleteDetail');
  Route::get('jual/getDataBarang/{jual}', 'JualController@getDataBarang')->name('jual.getDataBarang');
  Route::get('jual/getDetail/{jual}', 'JualController@getDetail')->name('jual.getDetail');
  Route::resource('jual','JualController');

  // Route::get('returnjual/cetak/{returnjual}', 'ReturnJualController@cetak')->name('returnjual.cetak');
  Route::get('returnterima/getSupplier/{nomor}', 'ReturnTerimaController@getSupplier')->name('returnterima.getSupplier');
  Route::get('returnterima/listBarang/{returnterima}', 'ReturnTerimaController@listBarang')->name('returnterima.listBarang');
  Route::post('returnterima/deleteDetail', 'ReturnTerimaController@deleteDetail')->name('returnterima.deleteDetail');
  Route::get('returnterima/getDataBarang/{returnterima}/{id_terima}', 'ReturnTerimaController@getDataBarang')->name('returnterima.getDataBarang');
  Route::get('returnterima/getDetail/{nomor}', 'ReturnTerimaController@getDetail')->name('returnterima.getDetail');
  Route::resource('returnterima','ReturnTerimaController');

  Route::post('lapstok/print','LapStokController@cetak')->name('lapstok.cetak');
  Route::post('lapstok/getData','LapStokController@getData')->name('lapstok.getData');
  Route::get('lapstok','LapStokController@index')->name('lapstok.index');

  Route::post('lappesan/print','LapPesanController@cetak')->name('lappesan.cetak');
  Route::post('lappesan/getData','LapPesanController@getData')->name('lappesan.getData');
  Route::get('lappesan','LapPesanController@index')->name('lappesan.index');

  Route::post('lapterima/print','LapTerimaController@cetak')->name('lapterima.cetak');
  Route::post('lapterima/getData','LapTerimaController@getData')->name('lapterima.getData');
  Route::get('lapterima','LapTerimaController@index')->name('lapterima.index');

  Route::post('lapjual/print','LapJualController@cetak')->name('lapjual.cetak');
  Route::post('lapjual/getData','LapJualController@getData')->name('lapjual.getData');
  Route::get('lapjual','LapJualController@index')->name('lapjual.index');

  Route::post('lapreturnterima/print','LapReturnJualController@cetak')->name('lapreturnterima.cetak');
  Route::post('lapreturnterima/getData','LapReturnJualController@getData')->name('lapreturnterima.getData');
  Route::get('lapreturnterima','LapReturnJualController@index')->name('lapreturnterima.index');


  Route::get('grafikpesan','GrafikPesanController@index')->name('grafikpesan.index');
  Route::get('grafikterima','GrafikTerimaController@index')->name('grafikterima.index');
  Route::get('grafikreturnterima','GrafikReturnTerimaController@index')->name('grafikreturnterima.index');
  Route::get('grafikjual','GrafikJualController@index')->name('grafikjual.index');

});
