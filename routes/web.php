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


    Route::get('user', 'UserController@index');
    Route::get('user/json', 'UserController@json');

    //Master Station
    Route::get('/station', 'StationController@index');
    Route::get('/station/json', 'StationController@json');
    Route::post('/station/create', 'StationController@create');
    Route::get('/tampiladdstation', 'StationController@tampiladd');
    Route::get('/station/{id}/delete', 'StationController@delete');
    Route::get('/station/edit/{id}', 'StationController@edit');
    Route::post('/station/update/{id}', 'StationController@update');
    Route::get('/station1', 'StationController@station');
    Route::get('/station/export_excel', 'StationController@export_excel');
    Route::post('/station/import_excel', 'StationController@import_excel');

    //Mobile Station
    Route::get('/mobile', 'MobileController@mobile');
    Route::get('/tampiladdmobile', 'MobileController@tambah');
    Route::post('/mobile/create', 'MobileController@create');
    Route::get('/mobile/edit/{id}', 'MobileController@edit');
    Route::post('/mobile/update/{id}', 'MobileController@update');
    Route::get('/mobile/{id}/delete', 'MobileController@delete');

    //Fix Station
    Route::get('/fix', 'FixStationController@fix');
    Route::get('/tampiladdfix', 'FixStationController@tambah');
    Route::post('/fix/create', 'FixStationController@create');
    Route::get('/fix/edit/{id}', 'FixStationController@edit');
    Route::post('/fix/update/{id}', 'FixStationController@update');

    //Fuelman
    Route::get('/fuel', 'FuelmanController@fuel');
    Route::get('/tampiladdfuel', 'FuelmanController@tambah');
    Route::post('/fuel/create', 'FuelmanController@create');
    Route::get('/fuel/edit/{id}', 'FuelmanController@edit');
    Route::post('/fuel/update/{id}', 'FuelmanController@update');
    Route::get('/fuel/{id}/delete', 'FuelmanController@delete');
    Route::get('/fuel/export_excel', 'FuelmanController@export_excel');
    Route::post('/fuel/import_excel', 'FuelmanController@import_excel');

    //Equipment & Unit Data
    Route::get('/equipment', 'EquipmentController@equipment');
    Route::get('/tampiladdequipment', 'EquipmentController@tambah');
    Route::post('/equipment/create', 'EquipmentController@create');
    Route::get('/equipment/edit/{id}', 'EquipmentController@edit');
    Route::post('/equipment/update/{id}', 'EquipmentController@update');
    Route::get('/equipment/{id}/delete', 'EquipmentController@delete');

    //Owner
    Route::get('/owner', 'OwnerController@owner');
    Route::get('/tampiladdowner', 'OwnerController@tambah');
    Route::get('/owner/edit/{id}', 'OwnerController@edit');
    Route::post('/owner/create', 'OwnerController@create');
    Route::post('/owner/update/{id}', 'OwnerController@update');
    Route::get('/owner/{id}/delete', 'OwnerController@delete');
    Route::get('/owner/export_excel', 'OwnerController@export_excel');

    //Fuelman
    Route::get('/fuelman', 'FuelmanController@fuelman');
    Route::get('/tampiladdfuelman', 'FuelmanController@tambah');
    Route::post('/fuelman/create', 'FuelmanController@create');
    Route::get('/fuelman/edit/{id}', 'FuelmanController@edit');
    Route::post('/fuelman/update/{id}', 'FuelmanController@update');
    Route::get('/fuelman/{id}/delete', 'FuelmanController@delete');
    Route::get('/fuelman/export_excel', 'FuelmanController@export_excel');

    //Organization
    Route::get('/organization', 'OrganizationController@organization');
    Route::get('/tampiladdorganization', 'OrganizationController@tambah');
    Route::post('/organization/create', 'OrganizationController@create');
    Route::get('/organization/edit/{id}', 'OrganizationController@edit');
    Route::post('/organization/update/{id}', 'OrganizationController@update');
    Route::get('/organization/{id}/delete', 'OrganizationController@delete');
    Route::get('/organization/export_excel', 'OrganizationController@export_excel');

    //User LV
    Route::get('/userlv', 'UserLVController@userlv');
    Route::get('/tampiladduserlv', 'UserLVController@tambah');
    Route::post('/userlv/create', 'UserLVController@create');
    Route::get('/userlv/edit/{id}', 'UserLVController@edit');
    Route::post('/userlv/update/{id}', 'UserLVController@update');
    Route::get('/userlv/{id}/delete', 'UserLVController@delete');
    Route::get('/userlv/export_excel', 'UserLVController@export_excel');

    //Voucher
    Route::get('/voucher', 'VoucherController@voucher');
    Route::get('/tampiladdvoucher', 'VoucherController@tambah');
    Route::post('/voucher/create', 'VoucherController@create');
    Route::get('/voucher/edit/{id}', 'VoucherController@edit');
    Route::post('/voucher/update/{id_voucher}', 'VoucherController@update');
    Route::get('/voucher/{id}/delete', 'VoucherController@delete');
    Route::get('/print_voucher', 'VoucherController@print');

    //Reloading
    Route::get('/reloading', 'ReloadingController@reloading');
    Route::get('/tampiladdreloading', 'ReloadingController@tambah');
    Route::post('/reloading/create', 'ReloadingController@create');
    Route::get('/reloading/edit/{id}', 'ReloadingController@edit');
    Route::post('/reloading/update/{id}', 'ReloadingController@update');
    Route::get('/reloading/{id}/delete', 'ReloadingController@delete');

    //Penerimaan Solar
    Route::get('/penerimaan', 'PenerimaanController@penerimaan');

    //User
    Route::get('/user1', 'UserController@user1');
    Route::get('/tampiladduser', 'UserController@tambah');
    Route::post('/user/create', 'UserController@create');
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::post('/user/update/{id}', 'UserController@update');
    Route::get('/user/{id}/delete', 'UserController@delete');



    //Status Id
    Route::get('/status', 'StatusController@index');
    Route::get('/tampilstatus', 'StatusController@tambah');
    Route::post('/status/create', 'StatusController@create');
    Route::get('status/edit/{id}', 'StatusController@edit');
});
