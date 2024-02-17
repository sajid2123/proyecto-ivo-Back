<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\LoginController;
use App\Http\Controllers\Api\V1\AuthFrontController;
use App\Http\Controllers\Api\V1\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/*Route::group(['prefix' => 'v1'], function () {
    Route::post('login', [LoginController::class, 'store']);
});*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'v1'

], function ($router) {

    Route::post('login', [AuthFrontController::class, 'login']);
    /*Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);*/

    Route::apiResource('pacientes', App\Http\Controllers\Api\V1\PacienteController::class);
    Route::apiResource('citas', App\Http\Controllers\Api\V1\CitaController::class);
    Route::post('crear-citas', [App\Http\Controllers\Api\V1\CitaController::class, 'store']);
    Route::apiResource('medicos', App\Http\Controllers\Api\V1\MedicoController::class);
    //Route::get('/pacientes/{id}', [App\Http\Controllers\Api\V1\PacienteController::class, 'show']);

   
});



Route::apiResource('v1/pacientes', App\Http\Controllers\Api\V1\PacienteController::class);
Route::apiResource('v1/usuarios', App\Http\Controllers\Api\V1\UsuarioController::class);
Route::apiResource('v1/gestores', App\Http\Controllers\Api\V1\GestorController::class);


