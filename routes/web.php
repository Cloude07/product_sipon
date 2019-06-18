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

// Объявляем маршруты для ресурсного контроллера ProductController,
 // назначая слово products префиксом URI 
 Route::resource('products', 'ProductController'); 
 Route::resource('manufacturers', 'ManufacturerController'); 

 // Т. к. метод remove() не предусмотрен в ресурсных контроллерах, 
 // объявляем маршрут самостоятельно. 
 Route::get('products/{product}/remove', 'ProductController@remove')      
 ->name('products.remove');
 Route::get('manufacturers/{manufacturer}/remove', 'ManufacturerController@remove')      
 ->name('manufacturers.remove');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
