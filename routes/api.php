<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\LoginController;
use App\Http\Controllers\Api\V1\AuthFrontController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\MailController;
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






Route::group([

    'middleware' => 'api',
    'prefix' => 'v1'

], function ($router) {
    //TFG
    Route::apiResource('usuarios', App\Http\Controllers\Api\V1\UsuarioController::class);
    Route::apiResource('donaciones', App\Http\Controllers\Api\V1\DonacionesController::class);
    Route::get('donaciones/{id}', [App\Http\Controllers\Api\V1\DonacionesController::class, 'show']);
    Route::get('donacionesCompletado', [App\Http\Controllers\Api\V1\DonacionesController::class, 'obtenerDonacionesPorEstadoCompletado']);
    Route::get('donacionesNoCompletado', [App\Http\Controllers\Api\V1\DonacionesController::class, 'obtenerDonacionesPorEstadoNoCompletado']);
    Route::delete('eliminar-donacion/{donacion}',  [App\Http\Controllers\Api\V1\DonacionesController::class, 'destroy']);
    Route::post('crear-donacion',  [App\Http\Controllers\Api\V1\DonacionesController::class, 'store']);
    Route::put('modificar-donacion/{donacion}', [App\Http\Controllers\Api\V1\DonacionesController::class, 'update']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('registrar-donante', [App\Http\Controllers\Api\V1\DonantesController::class, 'store']);
    Route::post('realizar-donacion', [App\Http\Controllers\Api\V1\DonacionesRealizadasController::class, 'store']);
    Route::get('donante/{idDonante}', [App\Http\Controllers\Api\V1\DonantesController::class, 'show']);
    Route::post('login', [App\Http\Controllers\Api\V1\DonantesController::class, 'login']);

    Route::post('/send-email', [App\Http\Controllers\Api\V1\MailController::class, 'sendEmail']);

    Route::apiResource('donaciones-realizadas', App\Http\Controllers\Api\V1\DonacionesRealizadasController::class);
    Route::get('cantidad-donaciones/{idDonacion}', [App\Http\Controllers\Api\V1\DonacionesController::class, 'obtenerCantidadDonacionesPorDonacion']);
    //TFG

    Route::apiResource('pacientes', App\Http\Controllers\Api\V1\PacienteController::class);
    Route::apiResource('citas', App\Http\Controllers\Api\V1\CitaController::class);    

    Route::post('crear-citas', [App\Http\Controllers\Api\V1\CitaController::class, 'store']);
    Route::post('alta-paciente', [App\Http\Controllers\Api\V1\UsuarioController::class, 'store']);

    Route::post('registrar-paciente', [App\Http\Controllers\Api\V1\PacienteController::class, 'store']);

    Route::post('registrar-diagnostico', [App\Http\Controllers\Api\V1\DiagnosticoController::class, 'store']);
    Route::get('obtener-diagnostico/{id_cita}', [App\Http\Controllers\Api\V1\DiagnosticoController::class, 'mostrarDiagnostico']);
    Route::post('modificar-diagnostico/{id}', [App\Http\Controllers\Api\V1\DiagnosticoController::class, 'update']);

    
    Route::apiResource('medicos', App\Http\Controllers\Api\V1\MedicoController::class);
    Route::get('medicos/{id_usuario_medico}', [App\Http\Controllers\Api\V1\MedicoController::class, 'listarPorId']);

    Route::apiResource('servicios', App\Http\Controllers\Api\V1\ServicioController::class);
    Route::delete('/api/v1/citas/{cita}', [App\Http\Controllers\Api\V1\CitaController::class, 'destroy']);
   
    Route::put('usuarios/{usuario}', [App\Http\Controllers\Api\V1\UsuarioController::class, 'update']);


    Route::put('citas/{cita}', [App\Http\Controllers\Api\V1\CitaController::class, 'update']);
    Route::get('citas/{fecha}', [App\Http\Controllers\Api\V1\CitaController::class, 'getCitasMedico']);

    Route::put('usuarios/{cita}', [App\Http\Controllers\Api\V1\CitaController::class, 'update']);
   // Route::get('citas/{fecha}', [App\Http\Controllers\Api\V1\CitaController::class, 'getCitasMedico']);

    Route::get('citas-pendiente-medico/{fecha}/{id_medico}', [App\Http\Controllers\Api\V1\CitaController::class, 'getCitasPendientesMedico']);
    Route::get('citas-realizada-medico/{fecha}/{id_medico}', [App\Http\Controllers\Api\V1\CitaController::class, 'getCitasRealizadasMedico']);

    Route::get('prueba/{id}', [App\Http\Controllers\Api\V1\PruebaController::class, 'getPrueba']);

    

    Route::get('citas-pendiente-radiologo/{fecha}/{id_radiologo}', [App\Http\Controllers\Api\V1\CitaController::class, 'getCitasPendientesRadiologo']);
    Route::get('citas-realizada-radiologo/{fecha}/{id_radiologo}', [App\Http\Controllers\Api\V1\CitaController::class, 'getCitasRealizadaRadiologo']);
    Route::post('crear-prueba', [App\Http\Controllers\Api\V1\PruebaController::class, 'store']);
    Route::get('citas-generales', [App\Http\Controllers\Api\V1\CitaController::class, 'getCitasMasRecientes']);
    Route::delete('imagen/{id}', [App\Http\Controllers\Api\V1\ImagenController::class, 'eliminarImagen']);
    Route::post('actualizar-prueba/{id}', [App\Http\Controllers\Api\V1\PruebaController::class, 'actualizarPrueba']);
    Route::apiResource('usuarios', App\Http\Controllers\Api\V1\UsuarioController::class);

});

Route::apiResource('v1/pacientes', App\Http\Controllers\Api\V1\PacienteController::class);
Route::apiResource('v1/usuarios', App\Http\Controllers\Api\V1\UsuarioController::class);
Route::apiResource('v1/gestores', App\Http\Controllers\Api\V1\GestorController::class);


