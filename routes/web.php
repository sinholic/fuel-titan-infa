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

    //Fuel
    Route::get('/fuel', 'FuelController@fuel');
    Route::get('/tampiladdfuel', 'FuelController@tambah');
    Route::post('/fuel/create', 'FuelController@create');
    Route::get('/fuel/edit/{id}', 'FuelController@edit');
    Route::post('/fuel/update/{id}', 'FuelController@update');
    Route::get('/fuel/{id}/delete', 'FuelController@delete');
    Route::get('/fuel/export_excel', 'FuelController@export_excel');
    Route::post('/fuel/import_excel', 'FuelController@import_excel');


    //Equipment
    Route::get('/equipment', 'EquipmentController@equipment');
    Route::get('/tampiladdequipment', 'EquipmentController@tampiladd');
    Route::post('/equipment/create', 'EquipmentController@create');
    Route::get('/equipment/edit/{id}', 'EquipmentController@edit');
    Route::post('/equipment/update/{id}', 'EquipmentController@update');
    Route::get('/equipment/{id}/delete', 'EquipmentController@delete');
    Route::get('/equipment/export_excel', 'EquipmentController@export_excel');
    Route::post('/equipment/import_excel', 'EquipmentController@import_excel');

    //Unit Data
    Route::get('/tampiladdunitdata', 'UnitDataController@tambah');
    Route::get('/unitdata', 'UnitDataController@unitdata');
    Route::post('/unitdata/create', 'UnitDataController@create');
    Route::get('/unitdata/edit/{id}', 'UnitDataController@edit');
    Route::post('/unitdata/update/{id}', 'UnitDataController@update');
    Route::get('/unitdata/{id}/delete', 'UnitDataController@delete');
    Route::get('/unitdata/export_excel', 'UnitDataController@export_excel');

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
    Route::post('/voucher/update/{id}', 'VoucherController@update');
    Route::get('/voucher/{id}/delete', 'VoucherController@delete');
});
