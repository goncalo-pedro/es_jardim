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
    return view('home');
});

Route::get('/import_excel', 'App\Http\Controllers\ExcelController@index');
Route::post('/import_excel/import', 'App\Http\Controllers\ExcelController@import');
Route::get('/export_excel', 'App\Http\Controllers\ExcelController@export');
Route::get('/export', function () {
    return view('export_excel');
});
Route::get('/perfil_taxa/{id}', 'App\Http\Controllers\ExcelController@perfilCompleto');





