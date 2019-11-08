<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', 'API\UserController@details');

    Route::group(['prefix' => 'equipment'], function () {
        Route::get('lists', 'API\EquipmentController@lists');
        Route::post('create', 'API\EquipmentController@create');
    });

    //Mobile Station
    Route::group(['prefix' => 'mobile'], function () {
        Route::get('/', 'API\MobileController@mobile');
        Route::post('/create', 'API\MobileController@create');
        Route::post('/update/{id}', 'API\MobileController@update');
        Route::get('/{id}/delete', 'API\MobileController@delete');
    });

    //Owner
    Route::group(['prefix' => 'owner'], function () {
        Route::get('/', 'API\OwnerController@lists');
        Route::post('/create', 'API\OwnerController@create');
        Route::post('/update/{id}', 'API\OwnerController@update');
        Route::get('/{id}/delete', 'API\OwnerController@delete');
    });

    Route::group(['prefix' => 'syncronize'], function () {
        Route::post('/', 'API\SyncronizeController@index');
        Route::post('upload', 'API\SyncronizeController@upload');
    });
});

Route::group(['prefix' => 'syncronize'], function () {
    Route::get('/', 'API\SyncronizeController@index');
});

// Route::get('siswa', 'SiswaController@index');
// Route::post('siswa', 'SiswaController@create');
// Route::put('/siswa/{id}', 'SiswaController@update');
// Route::delete('/siswa/{id}', 'SiswaController@delete');
