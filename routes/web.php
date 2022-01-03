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

use App\Http\Controllers\EmpregadosController;
use App\Http\Controllers\EmpresasController;


/**
 * Rota Tela Principal
 */
Route::get('/', function(){
    $titulo = "Tela inicial";

    return (
        "<h1>".$titulo."</h1>
        <br/>
        <a href='/empregados'>Empregados</a> 
        <br/>
        <a href='/empresas'>Empresas</a> "
    );
});

/**
 * Rota Tela Empregados
 */
Route::get('/empregados/empregados-select', [EmpregadosController::class, 'select']);
Route::post('/empregados/create-empregados', [EmpregadosController::class, 'create']);
Route::post('/empregados/update-empregados', [EmpresasController::class, 'update']);

/**
 * Rota Tela Empresas
 */
Route::get('/empresas/empresa-select', [EmpresasController::class, 'select']);
Route::post('/empresas/create-empresas', [EmpregadosController::class, 'create']);
Route::post('/empregados/update-empresas', [EmpresasController::class, 'update']);
