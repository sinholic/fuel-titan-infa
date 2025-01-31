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


    // Purhcase Order
    Route::get('/purchaseorder', 'PurchaseorderController@index');
    Route::get('/add_purchase', 'PurchaseorderController@tambah');
    Route::post('/purchase/create', 'PurchaseorderController@create');
    // Route::get('/station/json', 'StationController@json');
    // Route::post('/station/create', 'StationController@create');
    Route::get('/tampiladdpurchaseorder', 'StationController@tampiladd');
    // Route::get('/station/{id}/delete', 'StationController@delete');
    // Route::get('/station/edit/{id}', 'StationController@edit');
    // Route::post('/station/update/{id}', 'StationController@update');
    // Route::get('/station1', 'StationController@station');
    // Route::get('/station/export_excel', 'StationController@export_excel');
    Route::post('/purchaseorder/import', 'PurchaseorderController@import_excel');

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
    Route::get('/fix/detail/{id}', 'FixStationController@detail');

    //Equipment & Unit Data
    Route::get('/equipment', 'EquipmentController@equipment');
    Route::get('/tampiladdequipment', 'EquipmentController@tambah');
    Route::post('/equipment/create', 'EquipmentController@create');
    Route::get('/equipment/edit/{id}', 'EquipmentController@edit');
    Route::post('/equipment/update/{id}', 'EquipmentController@update');
    Route::get('/equipment/{id}/delete', 'EquipmentController@delete');
    Route::get('/equipment/detail/{id}', 'EquipmentController@detail');
    Route::get('/equipment/print_qr', 'EquipmentController@print');
    Route::get('/equipment/generate-card/{id}', 'EquipmentController@generateCard');


    //Owner
    Route::get('/owner', 'OwnerController@owner');
    Route::get('/tampiladdowner', 'OwnerController@tambah');
    Route::get('/owner/edit/{id}', 'OwnerController@edit');
    Route::post('/owner/create', 'OwnerController@create');
    Route::post('/owner/update/{id}', 'OwnerController@update');
    Route::get('/owner/{id}/delete', 'OwnerController@delete');
    Route::get('/owner/detail/{id}', 'OwnerController@detail');
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

    //User Assignment
    // Route::group(['prefix' => 'userassignment'], function () {
    //     Route::get('/', 'UserassignmentController@index')->name('userassignment.index');
    // });

    Route::get('/userassign', 'UserassignmentController@index');
    Route::get('/adduserassign', 'UserassignmentController@tambah');
    Route::post('/userassign/create', 'UserassignmentController@create');
    Route::get('/userassign/edit/{id}', 'UserassignmentController@edit');
    Route::post('/userassign/update/{id}', 'UserassignmentController@update');
    Route::get('/userassign/{id}/delete', 'UserassignmentController@delete');

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
    Route::get('/penerimaan/export_excel', 'PenerimaanController@export_excel');

    //User
    Route::get('/user', 'UserController@user');
    Route::get('/tampiladduser', 'UserController@tambah');
    Route::post('/user/create', 'UserController@create');
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::post('/user/update/{id}', 'UserController@update');
    Route::get('/user/{id}/delete', 'UserController@delete');
    Route::get('/user/print-qr', 'UserController@print');

    //Status Id
    Route::get('/status', 'StatusController@index');
    Route::get('/tampiladdstatus', 'StatusController@tambah');
    Route::post('/status/create', 'StatusController@create');
    Route::get('/status/edit/{id}', 'StatusController@edit');
    Route::post('/status/update/{id}', 'StatusController@update');
    Route::get('/status/{id}/delete', 'StatusController@delete');

    //Timesheet Status
    Route::get('/timesheetstatus', 'TimesheetstatusController@index');
    Route::get('/tampiladdtimesheetstatus', 'TimesheetstatusController@tambah');
    Route::post('/timesheetstatus/create', 'TimesheetstatusController@create');
    Route::get('/timesheetstatus/edit/{id}', 'TimesheetstatusController@edit');
    Route::post('/timesheetstatus/update/{id}', 'TimesheetstatusController@update');
    Route::get('/timesheetstatus/{id}/delete', 'TimesheetstatusController@delete');

    //User He
    Route::get('/userhe', 'UserheController@userhe');
    Route::get('/tampiladduserhe', 'UserheController@tambah');
    Route::post('/userhe/create', 'UserheController@create');
    Route::get('/userhe/edit/{id}', 'UserheController@edit');
    Route::post('/userhe/update/{id}', 'UserheController@update');
    Route::get('/userhe/{id}/delete', 'UserheController@delete');
    Route::get('/userhe/detail/{id}', 'UserheController@detail');

    //Equipment Category
    Route::get('/equipment_category', 'EquipmentcategoryController@index');
    Route::get('/addequipment_category', 'EquipmentcategoryController@tambah');
    Route::post('/equipment_category/create', 'EquipmentcategoryController@store');
    Route::get('/equipment_category/edit/{id}', 'EquipmentcategoryController@edit');
    Route::post('/equipment_category/update/{id}', 'EquipmentcategoryController@update');
    Route::get('/equipment_category/{id}/delete', 'EquipmentcategoryController@delete');
    Route::post('/equipment_category/import_excel', 'EquipmentcategoryController@import_excel');

    //Pengisian Solar On Mobile
    Route::get('/pengisian_mobile', 'PengisianMobileController@pengisian_mobile');
    Route::get('/addpengisian_mobile', 'PengisianMobileController@tambah');
    Route::post('/pengisian_mobile/create', 'PengisianMobileController@create');
    Route::get('/pengisian_mobile/edit/{id}', 'PengisianMobileController@edit');
    Route::post('/pengisian_mobile/update/{id}', 'PengisianMobileController@update');
    Route::get('/pengisian_mobile/{id}/delete', 'PengisianMobileController@delete');

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
    Route::post('/companycode/import_excel', 'CompanycodeController@import_excel');

    //Pengembalian Hutang
    Route::get('/pengembalian', 'HutangPiutangController@pengembalian_hutang');
    Route::get('/tambahpengembalian', 'HutangPiutangController@tambah_pengembalian_hutang');
    Route::post('/pengembalian/create', 'HutangPiutangController@create_pengembalian_hutang');
    Route::get('/pengembalian/edit/{id}', 'HutangPiutangController@edit_pengembalian_hutang');
    Route::post('/pengembalian/update/{id}', 'HutangPiutangController@update_pengembalian_hutang');
    Route::get('/pengembalian/{id}/delete', 'HutangPiutangController@delete_pengembalian_hutang');
    Route::get('/pengembalian/detail/{id}', 'HutangPiutangController@detail_pengembalian_hutang');

    //Pengambilan Hutang
    Route::get('/pengambilan', 'HutangPiutangController@pengambilan_hutang');
    Route::get('/tambahpengambilan', 'HutangPiutangController@tambah_pengambilan_hutang');
    Route::post('/pengambilan/create', 'HutangPiutangController@create_pengambilan_hutang');
    Route::get('/pengambilan/edit/{id}', 'HutangPiutangController@edit_pengambilan_hutang');
    Route::post('/pengambilan/update/{id}', 'HutangPiutangController@update_pengambilan_hutang');
    Route::get('/pengambilan/{id}/delete', 'HutangPiutangController@delete_pengambilan_hutang');

    //Pengeluran Piutang
    Route::get('/pengeluaran', 'HutangPiutangController@pengeluaran_piutang');
    Route::get('/tambahpengeluaran', 'HutangPiutangController@tambah_pengeluaran_piutang');
    Route::post('/pengeluaran/create', 'HutangPiutangController@create_pengeluaran_piutang');
    Route::get('/pengeluaran/edit/{id}', 'HutangPiutangController@edit_pengeluaran_piutang');
    Route::post('/pengeluaran/update/{id}', 'HutangPiutangController@update_pengeluaran_piutang');
    Route::get('/pengeluaran/{id}/delete', 'HutangPiutangController@delete_pengeluaran_piutang');

    //Penerimaan Piutang
    Route::get('/penerimaan_piutang', 'HutangPiutangController@penerimaan_piutang');
    Route::get('/tambahpenerimaan_piutang', 'HutangPiutangController@tambah_penerimaan_piutang');
    Route::post('/penerimaan_piutang/create', 'HutangPiutangController@create_penerimaan_piutang');
    Route::get('/penerimaan_piutang/edit{id}', 'HutangPiutangController@edit_penerimaan_piutang');
    Route::post('/penerimaan_piutang/update/{id}', 'HutangPiutangController@update_penerimaan_piutang');
    Route::get('/penerimaan_piutang/{id}/delete', 'HutangPiutangController@delete_penerimaan_piutang');

    //Pengajuan
        // Hutang
    Route::get('/pengajuan_hutang', 'PengajuanController@pengajuan_hutang');
    Route::get('/tambah_hutang', 'PengajuanController@tambah_hutang');
        // Piutang
    Route::get('/pengajuan_piutang', 'PengajuanController@pengajuan_piutang');
    Route::get('/tambah_piutang', 'PengajuanController@tambah_piutang');

    Route::post('/pengajuan/create', 'PengajuanController@create');
    Route::get('/pengajuan/edit/{id}', 'PengajuanController@edit');
    Route::post('/pengajuan/update/{id}', 'PengajuanController@update');
    Route::get('/pengajuan/{id}/delete', 'PengajuanController@delete');
    Route::get('/pengajuan/{id}/approve', 'PengajuanController@approve');
    Route::get('/pengajuan/{id}/reject', 'PengajuanController@reject');
    Route::get('/pengajuan/detail/{id}', 'PengajuanController@detail');
    Route::get('/cetakhutang/{id}', 'PengajuanController@bukticetak');

    //Equipment Card
    Route::get('/card', 'EquipmentcardController@card');
    Route::get('/tambahcard', 'EquipmentcardController@tambah');
    Route::post('/card/create', 'EquipmentcardController@create');
    Route::get('/card/edit/{id}', 'EquipmentcardController@edit');
    Route::post('/card/update/{id}', 'EquipmentcardController@update');
    Route::get('/card/{id}/delete', 'EquipmentcardController@delete');

    //Qty Solar
    Route::get('/qty_solar', 'QtySolarController@qty_solar');
    Route::get('/tambah_qtysolar', 'QtySolarController@tambah');
    Route::post('/qty_solar/create', 'QtySolarController@create');
    Route::get('/qty_solar/edit/{id}', 'QtySolarController@edit');
    Route::post('/qty_solar/update/{id}', 'QtySolarController@update');
    Route::get('/qty_solar/{id}/delete', 'QtySolarController@delete');

    //Materials
    Route::get('/materials', 'MaterialsController@materials');
    Route::get('/tambah_materials', 'MaterialsController@tambah');
    Route::post('/materials/create', 'MaterialsController@create');
    Route::get('/materials/edit/{id}', 'MaterialsController@edit');
    Route::post('/materials/update/{id}', 'MaterialsController@update');
    Route::get('/materials/{id}/delete', 'MaterialsController@delete');

    //Merk
    Route::get('/merk', 'MerkController@merk');
    Route::get('/tambah_merk', 'MerkController@tambah');
    Route::post('/merk/create', 'MerkController@create');
    Route::get('/merk/edit/{id}', 'MerkController@edit');
    Route::post('/merk/update/{id}', 'MerkController@update');
    Route::get('/merk/{id}/delete', 'MerkController@delete');

    //Tipe Equipment
    Route::get('/tipe_equipment', 'TipeController@tipe_equipment');
    Route::get('/tambah_tipe_equipment', 'TipeController@tambah');
    Route::post('/tipe_equipment/create', 'TipeController@create');
    Route::get('/tipe_equipment/edit/{id}', 'TipeController@edit');
    Route::post('/tipe_equipment/update/{id}', 'TipeController@update');
    Route::get('/tipe_equipment/{id}/delete', 'TipeController@delete');
    Route::get('/detail/tipe_equipment/{id}', 'TipeController@detail');

    //Consignment
    Route::get('/consignment', 'ConsignmentController@consignment');
    Route::get('/tambah_consignment', 'ConsignmentController@tambah');
    Route::post('/consignment/create', 'ConsignmentController@create');
    Route::get('/consignment/edit/{id}', 'ConsignmentController@edit');
    Route::post('/consignment/update/{id}', 'ConsignmentController@update');
    Route::get('/consignment/{id}/delete', 'ConsignmentController@delete');

    //Kalibrasi
    Route::get('/kalibrasi', 'KalibrasiController@kalibrasi');
    Route::get('/tambah_kalibrasi', 'KalibrasiController@tambah');
    Route::post('/kalibrasi/create', 'KalibrasiController@create');
    Route::get('/kalibrasi/edit/{id}', 'KalibrasiController@edit');
    Route::post('/kalibrasi/update/{id}', 'KalibrasiController@update');
    Route::get('/kalibrasi/{id}/delete', 'KalibrasiController@delete');

    //Daftar Pengisian
    Route::get('/daf_pengisian', 'ReloadingunitController@daf_pengisian');

    //Stock Opname
    // Route::get('/stockopname', 'StockOpnameController@stockopname');
    Route::get('/stockopname', 'StockOpnameController@stockopname1');
    Route::post('/stockopname', 'StockOpnameController@stockopnameByDate');
    Route::get('/tambah_stockopname', 'StockOpnameController@tambah');
    Route::post('/stockopname/create', 'StockOpnameController@create');
    Route::post('/stockopname/update/{id}', 'StockOpnameController@update');
    Route::get('/stockopname/edit/{id}', 'StockOpnameController@edit');


    //Inventori
    Route::get('/inventori', 'InventoriController@inventori');
    Route::get('/addInventori', 'InventoriController@addinventori');
    Route::post('/inventori/create', 'InventoriController@create');
    Route::get('/inventori/refresh/{id}', 'InventoriController@refresh');
    Route::get('/inventori/edit/{id}', 'InventoriController@edit');
    Route::post('/inventori/update/{id}', 'InventoriController@update');
    
    //stock global
    Route::get('/stockglobal', 'StockGlobalController@stockglobal');

});
