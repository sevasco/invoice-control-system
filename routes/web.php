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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function ()
{
    Route::get('home', 'HomeController@index')->name('home');

    Route::resource('invoices', 'InvoiceController');
    Route::get('invoices-export-excel', 'InvoiceController@exportExcel')->name('invoices.exportExcel');
    Route::post('invoices-import-excel', 'InvoiceController@import')->name('invoices.import');

    Route::resource('customers', 'CustomerController');

    Route::resource('items', 'ItemController');

    Route::resource('sellers', 'SellerController');

});



