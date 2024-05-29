<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\Api\V1\LoginController;

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
Route::get('/usuario/gestor/usuario', [UsuarioController::class, 'mostrarUsuarios'])->name('usuario.mostrar');
Route::get('/usuario/gestor/donacion', [UsuarioController::class, 'mostrarDonacion'])->name('donacion.mostrar');
Route::get('/usuario/gestor/donacion/crear-donacion', [UsuarioController::class, 'crearDonacion'])->name('crear-donacion');
Route::get('/usuario/gestor/donacion/datos-donacion', [UsuarioController::class, 'datosDonacion'])->name('datos-donacion');
Route::get('/usuario/gestor/donacion/editar-donacion', [UsuarioController::class, 'editarDonacion'])->name('editar-donacion');
Route::get('/login', [UsuarioController::class, 'index'])->name('login');




Route::group(['middleware' => 'gestor'], function(){

    Route::get('/logout', [UsuarioController::class, 'logout'])->name('usuario.logout');

    //Rutas Usuario
    Route::get('/usuario', [GestorController::class, 'Dashboard'])->name('gestor.usuario');
    Route::get('/usuario/add-usuario', [UsuarioController::class, 'addUsuario'])->name('gestor.add-usuario');
    Route::post('/usuario/add-usuario/anyadir', [UsuarioController::class, 'store'])->name('usuario.crear');
    Route::get('/usuario/{id}/editar', [UsuarioController::class, 'edit'])->name('usuario.edit');
    Route::get('/usuario/{id}/perfil', [UsuarioController::class, 'perfil'])->name('usuario.perfil');
    Route::delete('/usuario/{id}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');

    //outas Servicio
    Route::get('/servicio', [ServicioController::class, 'index'])->name('gestor.servicio');
    Route::get('/servicio/add-servicio', [ServicioController::class, 'addServicio'])->name('gestor.add-servicio');
    Route::post('/servicio/add-servicio/anyadir', [ServicioController::class, 'store'])->name('servicio.crear');
    Route::post('/servicio/{id}/editar/modificar', [ServicioController::class, 'update'])->name('servicio.modificar');
    Route::get('/servicio/{id}/editar', [ServicioController::class, 'edit'])->name('servicio.edit');;


    //Routas Rol
    Route::get('/rol', [RolController::class, 'index'])->name('gestor.rol');
    Route::get('/rol/add-rol', [RolController::class, 'addRol'])->name('gestor.add-rol');
    Route::post('/rol/add-rol/anyadir', [RolController::class, 'store'])->name('rol.crear');
    Route::post('/rol/{id}/editar/modificar', [RolController::class, 'update'])->name('rol.modificar');
    Route::get('/rol/{id}/editar', [RolController::class, 'edit'])->name('rol.edit');

});
