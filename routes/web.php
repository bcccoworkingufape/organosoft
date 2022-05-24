<?php
use App\Http\Controllers\CategoriaVeiculoController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\MaquinaController;
use App\Http\Controllers\EspacosFabricaController;
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
    Route::get('/relatorios', function () {
        return view('relatorios.index');
    })->name('relatorios');
    Route::get('/residuos', function () {
        return view('residuos-home');
    })->name('residuos');

    Route::resource('veiculos', VeiculoController::class)->parameters([
        'veiculos' => 'veiculo',
    ]);

    Route::resource('categoriaVeiculos', CategoriaVeiculoController::class)->parameters([
        'categoriasVeiculos' => 'categoriaVeiculo',
    ]);

    Route::resource('equipamentos', EquipamentoController::class)->parameters([
        'equipamentos' => 'equipamento',
    ]);
    
    Route::resource('maquinas', MaquinaController::class)->parameters([
        'maquinas' => 'maquina',
    ]);

    Route::resource('espacosFabrica', EspacosFabricaController::class)->parameters([
        'espacosFabrica' => 'espacosFabrica'
    ]);
});
