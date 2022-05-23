<?php

use App\Http\Controllers\ContratoController;
use App\Http\Controllers\GranjaController;
use App\Http\Controllers\ProdutorController;
use App\Http\Controllers\ColetaController;
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

    Route::get('/coleta/{granja_id}', [ColetaController::class, 'index'])->name('coleta');
    Route::get('/coletas/{granja_id}/show', [ColetaController::class, 'show'])->name('coleta.show');
    Route::get('/coleta/{coleta_id}/view', [ColetaController::class, 'view'])->name('coleta.view');
    Route::get('/coleta/{coleta_id}/edit', [ColetaController::class, 'edit'])->name('coleta.edit');
    Route::post('/coleta/{coleta_id}/store', [ColetaController::class, 'store'])->name('coleta.store');
    Route::get('/coleta/{coleta_id}/create', [ColetaController::class, 'pCreate'])->name('coleta.p.create');
    Route::post('/coleta/create', [ColetaController::class, 'create'])->name('coleta.create');
});
