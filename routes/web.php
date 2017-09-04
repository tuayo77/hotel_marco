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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/clients','clientscontroller');
Route::resource('/type_chambres','type_chambrecontroller');
Route::resource('/chambres','chambrecontroller');
Route::resource('/reservations','reservationscontroller');
Route::resource('/facture','facturecontroller');
Route::resource('/pdf','pdfcontroller');