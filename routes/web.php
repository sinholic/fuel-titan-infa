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
    return view('auth.login');
});

// Route::post('login', 'API\UserController@login');
// Route::post('register', 'API\UserController@register');

// Route::group(['middleware' => 'auth:api'], function () {
//     Route::post('details', 'API\UserController@details');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', function () {
        return view('admin');
    })->name('adminpage');

    // Route::get('admin-login', 'Auth\AdminLoginController@showLoginForm');
    // Route::post('admin-login', ['as' => 'admin-login', 'uses' => 'Auth\AdminLoginController@login']);
    // Route::get('/admin-register', 'Auth\AdminLoginController@showRegisterPage');
    // Route::post('admin-register', 'Auth\AdminLoginController@register')->name('admin.register');


    // Route::get('user', 'UserController@index');
    // Route::get('user/json', 'UserController@json');

    //Master Station
    // Route::get('/station', 'StationController@index');
    // Route::get('/station/json', 'StationController@json');
    // Route::post('/station/create', 'StationController@create');
    // Route::get('/tampiladdstation', 'StationController@tampiladd');
    // Route::get('/station/{id}/delete', 'StationController@delete');
    // Route::get('/station/edit/{id}', 'StationController@edit');
    // Route::post('/station/update/{id}', 'StationController@update');
    // Route::get('/station1', 'StationController@station');
    // Route::get('/station/export_excel', 'StationController@export_excel');
    // Route::post('/station/import_excel', 'StationController@import_excel');

    //Mobile Station
    Route::get('/mobile', 'MobileController@mobile');
    Route::get('/tampiladdmobile', 'MobileController@tambah');
    Route::post('/mobile/create', 'MobileController@create');
    Route::get('/mobile/edit/{id}', 'MobileController@edit');
    Route::post('/mobile/update/{id}', 'MobileController@update');
    Route::get('/mobile/{id}/delete', 'MobileController@delete');
    Route::get('/mobile/export_excel', 'MobileController@export_excel');

    //Fix Station
    Route::get('/fix', 'FixStationController@fix');
    Route::get('/tampiladdfix', 'FixStationController@tambah');
    Route::post('/fix/create', 'FixStationController@create');
    Route::get('/fix/edit/{id}', 'FixStationController@edit');
    Route::post('/fix/update/{id}', 'FixStationController@update');
    Route::get('/fix/{id}/delete', 'FixStationController@delete');
    Route::get('/fix/export_excel', 'FixStationController@export_excel');

    //Equipment & Unit Data
    Route::get('/equipment', 'EquipmentController@equipment');
    Route::get('/tampiladdequipment', 'EquipmentController@tambah');
    Route::post('/equipment/create', 'EquipmentController@create');
    Route::get('/equipment/edit/{id}', 'EquipmentController@edit');
    Route::post('/equipment/update/{id}', 'EquipmentController@update');
    Route::get('/equipment/{id}/delete', 'EquipmentController@delete');
    Route::get('/equipment/print_qr', 'EquipmentController@print');


    //Owner
    Route::get('/owner', 'OwnerController@owner');
    Route::get('/tampiladdowner', 'OwnerController@tambah');
    Route::get('/owner/edit/{id}', 'OwnerController@edit');
    Route::post('/owner/create', 'OwnerController@create');
    Route::post('/owner/update/{id}', 'OwnerController@update');
    Route::get('/owner/{id}/delete', 'OwnerController@delete');
    Route::get('/owner/export_excel', 'OwnerController@export_excel');
    Route::get('/owner/print_qr', 'OwnerController@print');


    //Voucher
    Route::get('/voucher', 'VoucherController@voucher');
    Route::get('/tampiladdvoucher', 'VoucherController@tambah');
    Route::post('/voucher/create', 'VoucherController@create');
    Route::get('/voucher/edit/{id}', 'VoucherController@edit');
    Route::post('/voucher/update/{id_voucher}', 'VoucherController@update');
    Route::get('/voucher/{id}/delete', 'VoucherController@delete');
    Route::get('/voucher/print/{id}', 'VoucherController@print');
    Route::get('/voucher/lists/{id}', 'VoucherController@lists');
    Route::get('/voucher/reject/{id_voucher}/{id_vouchercode}', 'VoucherController@reject');

    Route::group(['prefix' => 'userassignment'], function () {
        Route::get('/', 'UserassignmentController@index')->name('userassignment.index');
    });

    //Reloading
    Route::get('/reloading', 'ReloadingController@reloading');
    Route::get('/tampiladdreloading', 'ReloadingController@tambah');
    Route::post('/reloading/create', 'ReloadingController@create');
    Route::get('/reloading/edit/{id}', 'ReloadingController@edit');
    Route::post('/reloading/update/{id}', 'ReloadingController@update');
    Route::get('/reloading/{id}/delete', 'ReloadingController@delete');

    //Penerimaan Solar
    Route::get('/penerimaan', 'PenerimaanController@penerimaan');
    Route::get('/tampiladdpenerimaan', 'PenerimaanController@tambah');
    Route::post('/penerimaan/create', 'PenerimaanController@create');
    Route::get('/penerimaan/edit/{id}', 'PenerimaanController@edit');
    Route::post('/penerimaan/update/{id}', 'PenerimaanController@update');
    Route::get('/penerimaan/{id}/delete', 'PenerimaanController@delete');

    //User
    Route::get('/user', 'UserController@user');
    Route::get('/tampiladduser', 'UserController@tambah');
    Route::post('/user/create', 'UserController@create');
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::post('/user/update/{id}', 'UserController@update');
    Route::get('/user/{id}/delete', 'UserController@delete');

    //Status Id
    Route::get('/status', 'StatusController@index');
    Route::get('/tampiladdstatus', 'StatusController@tambah');
    Route::post('/status/create', 'StatusController@create');
    Route::get('/status/edit/{id}', 'StatusController@edit');
    Route::post('/status/update/{id}', 'StatusController@update');
    Route::get('/status/{id}/delete', 'StatusController@delete');

    //User He
    Route::get('/userhe', 'UserheController@userhe');
    Route::get('/tampiladduserhe', 'UserheController@tambah');
    Route::post('/userhe/create', 'UserheController@create');
    Route::get('/userhe/edit/{id}', 'UserheController@edit');
    Route::post('/userhe/update/{id}', 'UserheController@update');
    Route::get('/userhe/{id}/delete', 'UserheController@delete');

    //Equipment Category
    Route::get('/equipment_category', 'EquipmentcategoryController@index');
    Route::get('/addequipment_category', 'EquipmentcategoryController@tambah');
    Route::post('/equipment_category/create', 'EquipmentcategoryController@store');
    Route::get('/equipment_category/edit/{id}', 'EquipmentCategoryController@edit');
    Route::post('/equipment_category/update/{id}', 'EquipmentCategoryController@update');
    Route::get('/equipment_category/{id}/delete', 'EquipmentCategoryController@destroy');

    //Pengisian Solar On Mobile
    Route::get('/pengisian_mobile', 'PengisianMobileController@pengisian_mobile');
    Route::get('/addpengisian_mobile', 'PengisianMobileController@tambah');
    Route::post('/pengisian_mobile/create', 'PengisianMobileController@create');
    Route::get('/pengisian_mobile/edit/{id}', 'PengisianMobileController@edit');

    //Pengisian Solar On Fix
    Route::get('/pengisian_fix', 'PengisianFixController@pengisian_fix');
    Route::get('/addpengisian_fix', 'PengisianFixController@tambah');
    Route::post('/pengisian_fix/create', 'PengisianFixController@create');
    Route::get('/pengisian_fix/edit/{id}', 'PengisianFixController@edit');
    Route::post('/pengisian_fix/update/{id}', 'PengisianFixController@update');
    Route::get('/pengisian_fix/{id}/delete', 'PengisianFixController@delete');

    //Company Code
    Route::get('/companycode', 'CompanycodeController@index');
    Route::get('/addcompany', 'CompanycodeController@tambah');
    Route::post('/companycode/create', 'CompanycodeController@create');
    Route::get('/companycode/edit/{id}', 'CompanycodeController@edit');
    Route::post('/companycode/update/{id}', 'CompanycodeController@update');
    Route::get('/companycode/{id}/delete', 'CompanycodeController@delete');

    //Peminjaman Solar
    Route::get('/peminjaman', 'PeminjamanController@peminjaman');
    Route::get('/addpeminjaman', 'PeminjamanController@tambah');
    Route::post('/peminjaman/create', 'PeminjamanController@create');
    Route::get('/peminjaman/edit/{id}', 'PeminjamanController@edit');
    Route::post('/peminjaman/update/{id}', 'PeminjamanController@update');
    Route::get('/peminjaman/{id}/delete', 'PeminjamanController@delete');

    //Pengembalian
    Route::get('/pengembalian', 'PengembalianController@pengembalian');
    Route::get('/tambahpengembalian', 'PengembalianController@tambah');
    Route::post('/pengembalian/create', 'PengembalianController@create');
    Route::get('/pengembalian/edit/{id}', 'PengembalianController@edit');
    Route::post('/pengembalian/update/{id}', 'PengembalianController@update');
    Route::get('/pengembalian/{id}/delete', 'PengembalianController@delete');

    //Pengambilan
    Route::get('/pengambilan', 'PengambilanController@pengambilan');
    Route::get('/tambahpengambilan', 'PengambilanController@tambah');
    Route::post('/pengambilan/create', 'PengambilanController@create');
    Route::get('/pengambilan/edit/{id}', 'PengambilanController@edit');
    Route::post('/pengambilan/update/{id}', 'PengambilanController@update');
    Route::get('/pengambilan/{id}/delete', 'PengambilanController@delete');

    //Pengajuan
    Route::get('/pengajuan', 'PengajuanController@pengajuan');
    Route::get('/tambahpengajuan', 'PengajuanController@tambah');
    Route::post('/pengajuan/create', 'PengajuanController@create');
    Route::get('/pengajuan/edit/{id}', 'PengajuanController@edit');
    Route::post('/pengajuan/update/{id}', 'PengajuanController@update');
    Route::get('/pengajuan/{id}/delete', 'PengajuanController@delete');
});
