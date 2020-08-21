<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'UserController@user');
Route::get('/adduser', 'UserController@add_user');
Route::get('/edituser/{id}', 'UserController@editUser');
Route::post('/createuser', 'UserController@create');
Route::post('/upadateuser/{id}', 'UserController@update');
Route::get('/user/{id}/delete', 'UserController@delete');
// Tender
Route::get('/tender', 'TenderController@tender');
Route::get('/addtender', 'TenderController@addTender');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//bobot
Route::get('/bobot', 'BobotController@index');
Route::get('/addbobot', 'BobotController@addBobot');
Route::post('/createbobot', 'BobotController@create');
Route::get('/bobot/{id}/delete', 'BobotController@delete');
Route::get('/editbobot/{id}', 'BobotController@edit');

