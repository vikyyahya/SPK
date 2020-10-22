<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/users', 'UserController@user');
    Route::get('/users/cari', 'UserController@cari');
    Route::get('/adduser', 'UserController@add_user');
    Route::get('/edituser/{id}', 'UserController@editUser');
    Route::post('/createuser', 'UserController@create');
    Route::post('/upadateuser/{id}', 'UserController@update');
    Route::get('/user/{id}/delete', 'UserController@delete');
    Route::get('/export_user', 'UserController@export_pdf');
});
Route::group(['middleware' => ['auth']], function () {
    //home
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['middleware' => ['auth', 'suplier']], function () {
    //suplier
    Route::get('/suplier', 'SuplierController@suplier');
    Route::get('/suplier/{id}/delete', 'SuplierController@delete');
    Route::get('/editsuplier/{id}', 'SuplierController@edit');
    Route::post('/updatesuplier/{id}', 'SuplierController@update');
    Route::get('/suplier/cari', 'SuplierController@cari');
    Route::get('/export_suplier', 'SuplierController@export_pdf');

    //penawaran
    Route::get('/penawaranharga', 'PenawaranHargaController@penawaranharga');
    Route::get('/listpenawaranharga', 'PenawaranHargaController@index');
    Route::get('/previewpenawaran/{id}', 'PenawaranHargaController@preview');
    Route::post('/creatpenawaran', 'PenawaranHargaController@create');
    Route::get('/export_penawaran', 'PenawaranHargaController@export_pdf');
});

Route::group(['middleware' => ['auth', 'procurement']], function () {

    // //penawarran 
    // Route::get('/penawaranharga', 'PenawaranHargaController@penawaranharga');
    // Route::get('/listpenawaranharga', 'PenawaranHargaController@index');
    // Route::get('/previewpenawaran/{id}', 'PenawaranHargaController@preview');
    // Route::post('/creatpenawaran', 'PenawaranHargaController@create');
    // Route::get('/export_penawaran', 'PenawaranHargaController@export_excel');
    // // Tender
    Route::get('/tender', 'TenderController@tender');
    Route::get('/tender/cari', 'TenderController@cari');
    Route::get('/edittender/{id}', 'TenderController@edittender');
    Route::get('/addtender', 'TenderController@addTender');
    Route::post('/createtender', 'TenderController@create');
    Route::post('/updatetender/{id}', 'TenderController@update');
    Route::get('/tender/{id}/delete', 'TenderController@delete');
    Route::get('/export_tender', 'TenderController@export_pdf');

    //bobot
    Route::get('/bobot', 'BobotController@index');
    Route::get('/bobot/cari', 'BobotController@cari');
    Route::get('/addbobot', 'BobotController@addBobot');
    Route::post('/createbobot', 'BobotController@create');
    Route::get('/bobot/{id}/delete', 'BobotController@delete');
    Route::get('/editbobot/{id}', 'BobotController@edit');
    Route::post('/updatebobot/{id}', 'BobotController@update');
    Route::get('/export_bobot', 'BobotController@export_pdf');

    // perangkingan
    Route::get('/perangkingan', 'PerangkinganController@perangkingan');
    Route::get('/hitungperangkingan/{id}', 'PerangkinganController@hitung');
    Route::get('/export_perangkingan/{id}', 'PerangkinganController@export_pdf');

    //Suplier
    // Route::get('/suplier', 'SuplierController@suplier');
    // Route::get('/suplier/{id}/delete', 'SuplierController@delete');
    // Route::get('/editsuplier/{id}', 'SuplierController@edit');
    // Route::post('/updatesuplier/{id}', 'SuplierController@update');
    // Route::get('/suplier/cari', 'SuplierController@cari');
    // Route::get('/export_suplier', 'SuplierController@export_excel');
});
