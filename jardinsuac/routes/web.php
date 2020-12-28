<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\TaxaController;
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

Route::get('549321054/register', function (){
    return view('auth.register');
})->name("549321054/register");

Route::get('549321054/login', function (){
    return view('auth.login');
})->name("549321054/login");

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/home', function () {return view('admin.home');})->name("home");
    Route::post('/import_excel/import', [App\Http\Controllers\ExcelController::class, 'import'])->name('excel.import');
    Route::get('/export_excel', [App\Http\Controllers\ExcelController::class, 'export'])->name('excel.export');
    Route::get('/export', [App\Http\Controllers\ExcelController::class, 'export'])->name('excel.export');
    Route::resource("excel",ExcelController::class);
    Route::resource("taxa",TaxaController::class);
});

