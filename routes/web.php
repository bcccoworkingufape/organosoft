<?php

use App\Http\Controllers\ContratoController;
use App\Http\Controllers\GranjaController;
use App\Http\Controllers\ProdutorController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/residuos', function () {
        return view('residuos-home');
    })->name('residuos');
    Route::resource('produtores', ProdutorController::class)->parameters([
        'produtores' => 'produtor',
    ])->except('destroy');
    Route::resource('produtores.granjas', GranjaController::class)->parameters([
        'granjas' => 'granja',
        'produtores' => 'produtor',
    ])->except(['destroy', 'index'])->shallow();
    Route::get('granjas', [GranjaController::class, 'index'])->name('granjas.index');
    Route::resource('produtores.contratos', ContratoController::class)->parameters([
        'produtores' => 'produtor',
    ])->except('destroy')->shallow();
    Route::get('contratos/{contrato}/documento', [ContratoController::class, 'documento'])->name('contratos.documento');
});
