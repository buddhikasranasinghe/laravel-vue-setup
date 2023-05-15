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

Route::prefix('api')->group(function () {
    Route::resource('/pharmacy', 'PharmacyController');
    Route::resource('/products', 'ProductsController');
    Route::resource('/users', 'UserController');
    Route::post('/upload-file', 'FileUploadController@uploadFile');
});

Route::get('{any}', function () {
    return view('home');
})->where('any','.*');
