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

Route::get('/login','C_Auth@login')->name('login');
Route::post('/postlogin','C_Auth@postlogin');
Route::get('/logout','C_Auth@logout');

Route::group(['middleware' => ['auth','checkAkses:admin,user']],function(){
	Route::get('/','C_customers@index');
	Route::get('/buys/{id}',"C_customers@view_buys");
	Route::post('/orders/insert_proccess','C_Orders@insert_proccess');
});


Route::group(['middleware' => ['auth','checkAkses:admin']],function(){
// Routes For Orders
Route::get('/orders','C_Orders@index');
Route::get('/orders/all_data','C_Orders@get_data')->name("user.data");
Route::get('/orders/edit/{id}','C_Orders@edit_view');
Route::post('/orders/edit_proccess','C_Orders@edit_proccess');
Route::get('/orders/delete/{id}','C_Orders@delete_proccess');

// Routes For Product
Route::get('/product','C_Admins@index');
Route::get('/product/insert','C_Admins@insert_view');
Route::get('/product/edit/{id}','C_Admins@edit_view');
Route::post('/product/insert_proccess','C_Admins@insert_proccess');
Route::post('/product/edit_proccess','C_Admins@edit_proccess');
Route::get('/product/delete/{id}','C_Admins@delete_proccess');
Route::get('/product/all_data','C_Admins@get_data')->name("user.data");

// Routes For Users
Route::get('/users','C_users@index');
Route::get('/users/insert','C_users@insert_view');
Route::get('/users/edit/{id}','C_users@edit_view');
Route::post('/users/insert_proccess','C_users@insert_proccess');
Route::post('/users/edit_proccess','C_users@edit_proccess');
Route::get('/users/delete/{id}','C_users@delete_proccess');
Route::get('/users/all_data','C_users@get_data')->name("user.data");
});


