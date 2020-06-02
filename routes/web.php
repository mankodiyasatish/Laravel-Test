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

Route::get('files/{id}/download', 'UsersFilesController@download')->name('files.download');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('files', 'UsersFilesController');
});

Auth::routes();

Route::get('{any}/download', 'HomeController@downloadFileUrl')->name('file.download');
Route::get('{any}', 'HomeController@catchFileUrl')->name('file.catch');
