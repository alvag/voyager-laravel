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

use App\Http\Middleware\ProtectExportables;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('/exports', 'ExporterController@index')->middleware(ProtectExportables::class)->name('voyager.exports.index');
    Route::post('/exports', 'ExporterController@export')->middleware(ProtectExportables::class)->name('voyager.exports.download');
});
