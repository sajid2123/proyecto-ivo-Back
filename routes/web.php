<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\GestorController;

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
    return view('welcome');
});
Route::get('/hola', function () {
    return 'Hola mundo';
});



Route::get('/login', [UsuarioController::class, 'Index'])->name('login_form');
Route::post('/login/owner', [UsuarioController::class, 'Login'])->name('usuario.login');



Route::group(['middleware' => 'gestor'], function(){
    // Route::get('/usuario', [GestorController::class, 'Dashboard'])->name('gestor.dashboard');
    Route::get('/logout', [UsuarioController::class, 'logout'])->name('usuario.logout');
    Route::get('/usuario', [GestorController::class, 'Dashboard'])->name('gestor.dashboard');

});







// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
