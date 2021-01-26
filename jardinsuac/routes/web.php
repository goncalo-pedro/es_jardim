<?php

use App\Http\Controllers\AdminTaxaController;
use Illuminate\Support\Facades\Auth;
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

Route::get('549321054/login', function (){
    return view('auth.login');
})->name("549321054/login");

Route::get('549321054/register', function (){
    return view('admin.criar_users');
})->name("549321054/register");

Route::get('testemunhos', [\App\Http\Controllers\MemoriaUserController::class, 'homeMemoria'])->name('home.testemunhos');
Route::get('testemunhos/criar', [\App\Http\Controllers\MemoriaUserController::class, 'criarMemoria'])->name('criar.testemunhos');
Route::post('testemunhos/testemunhos', [\App\Http\Controllers\MemoriaUserController::class, 'storeMemorias'])->name('store.testemunhos');
Route::get('testemunhos/{id}', [\App\Http\Controllers\MemoriaUserController::class, 'showMemoria'])->name('detalhes.testemunhos');
Route::get("/historia", function(){
    return view("historia");
})->name("historia");
Route::get("/geologia", function(){
    return view("geologia");
})->name("geologia");
Route::resource("taxa",TaxaController::class);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/home', [AdminTaxaController::class,'home'])->name("admin.home");
    Route::get('/perfil', [App\Http\Controllers\UserController::class, 'perfil'])->name('admin.perfil');
    Route::get('/criar_user', function () {return view('admin.criar_users',[
        'user' => Auth::user()
    ]);})->name("criar_user");
    Route::post('users/{{id}}', [App\Http\Controllers\UserController::class, 'consultarUser'])->name('admin.consultarUser');
    Route::post('/perfil/alterarDados', [App\Http\Controllers\UserController::class, 'alterarDados'])->name('admin.alterarDados');
    Route::post('/perfil/alterarPassword', [App\Http\Controllers\UserController::class, 'alterarPass'])->name('admin.alterarPassword');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('listar_users');
    Route::post('/import_excel/import', [App\Http\Controllers\ExcelController::class, 'import'])->name('admin.importar');
    Route::get('/export_excel', [App\Http\Controllers\ExcelController::class, 'showExport'])->name('excel.export_file');
    Route::post('/export', [App\Http\Controllers\ExcelController::class, 'export'])->name('excel.export');

    Route::resource("memorias", \App\Http\Controllers\MemoriaController::class);
    Route::resource("taxas", AdminTaxaController::class);
    Route::resource("excel",ExcelController::class);
    Route::resource('administradores', \App\Http\Controllers\AdministradoresController::class);
});
