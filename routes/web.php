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


 Route::resource('Product', 'ProductController');


 

Route::get('/invoice', 'InvoiceController@index');
Route::get('/invoice/add', 'InvoiceController@add')->name('invoice.add');
Route::get('/invoice/detail/{id}', 'InvoiceController@detail')->name('invoice.detail');
Route::get('/invoice/pdf/{id}', 'InvoiceController@pdf')->name('invoice.pdf');
Route::get('/invoice/findClient', 'InvoiceController@findClient')->name('invoice.findClient');
Route::get('/invoice/findProduct', 'InvoiceController@findProduct')->name('invoice.findProduct');
Route::post('/invoice/save', 'InvoiceController@save')->name('invoice.save');


Route::get("/vender", "VenderController@index")->name("vender.index");
        Route::post("/productoDeVenta", "VenderController@agregarProductoVenta")->name("agregarProductoVenta");
        Route::delete("/productoDeVenta", "VenderController@quitarProductoDeVenta")->name("quitarProductoDeVenta");
        Route::post("/terminarOCancelarVenta", "VenderController@terminarOCancelarVenta")->name("terminarOCancelarVenta");