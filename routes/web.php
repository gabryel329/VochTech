<?php

use App\Http\Controllers\CargoColaboradorController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\ColaboradoresController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\UnidadesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

#UNIDADES
Route::get('/unidades', [UnidadesController::class, 'index'])->name('unidades.index');
Route::post('/unidades', [UnidadesController::class, 'store'])->name('unidades.store');
Route::put('/unidades/{id}', [UnidadesController::class, 'update'])->name('unidades.update');
Route::delete('/unidades/{id}', [UnidadesController::class, 'destroy'])->name('unidades.destroy');

#COLABORADORES
Route::get('/colaboradores', [ColaboradoresController::class, 'index'])->name('colaboradores.index');
Route::post('/colaboradores', [ColaboradoresController::class, 'store'])->name('colaboradores.store');
Route::put('/colaboradores/{id}', [ColaboradoresController::class, 'update'])->name('colaboradores.update');
Route::delete('/colaboradores/{id}', [ColaboradoresController::class, 'destroy'])->name('colaboradores.destroy');

#CARGOS
Route::get('/cargos', [CargosController::class, 'index'])->name('cargos.index');
Route::post('/cargos', [CargosController::class, 'store'])->name('cargos.store');
Route::put('/cargos/{id}', [CargosController::class, 'update'])->name('cargos.update');
Route::delete('/cargos/{id}', [CargosController::class, 'destroy'])->name('cargos.destroy');

#AVALIAÇÃO
Route::get('/cargocolaboradores', [CargoColaboradorController::class, 'index'])->name('cargocolaboradores.index');
Route::get('/cargocolaboradores/{id}', [CargoColaboradorController::class, 'buscar'])->name('cargocolaboradores.buscar');
Route::post('/cargocolaboradores', [CargoColaboradorController::class, 'store'])->name('cargocolaboradores.store');
Route::put('/cargocolaboradores/{id}', [CargoColaboradorController::class, 'update'])->name('cargocolaboradores.update');
Route::delete('/cargocolaboradores/{id}', [CargoColaboradorController::class, 'destroy'])->name('cargocolaboradores.destroy');

#RELATORIOS
Route::get('/relatorio/colaboradores', [RelatorioController::class, 'colaboradores'])->name('relatorio.colaboradores');
Route::get('/relatorio/unidades', [RelatorioController::class, 'unidades'])->name('relatorio.unidades');
Route::get('/relatorio/avaliacao', [RelatorioController::class, 'avaliacao'])->name('relatorio.avaliacao');
