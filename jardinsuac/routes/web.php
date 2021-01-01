<?php

use App\Http\Controllers\AdminTaxaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\TaxaController;
use App\Http\Controllers\Dashboard;
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
    return view("home");
});

Route::get('549321054/login', function (){
    return view('auth.login');
})->name("549321054/login");

Route::get('549321054/register', function (){
    return view('admin.criar_users');
})->name("549321054/register");

Route::resource("taxa",TaxaController::class);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    #Route::get('/home', function () {return view('admin.home');})->name("home");
    Route::get('/home', [AdminTaxaController::class,'home']);

    Route::get('/criar_user', function () {return view('admin.criar_users');})->name("criar_user");
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('listar_users');
    Route::post('/import_excel/import', [App\Http\Controllers\ExcelController::class, 'import'])->name('admin.importar');
    Route::get('/export_excel', [App\Http\Controllers\ExcelController::class, 'showExport'])->name('excel.export_file');
    Route::post('/export', [App\Http\Controllers\ExcelController::class, 'export'])->name('excel.export');

    Route::resource("taxas", AdminTaxaController::class);
    Route::resource("excel",ExcelController::class);
});

