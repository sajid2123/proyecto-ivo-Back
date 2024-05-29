<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash; // Agregado para usar la función Hash
use Illuminate\Support\Facades\Http;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function login(Request $request)
    {
         // Obtiene las credenciales del formulario
    $credentials = $request->only('email', 'password');

    // Realiza una solicitud POST a la API para verificar las credenciales
    $response = Http::post('http://localhost:8000/api/v1/login', $credentials);

    // Obtiene la respuesta de la API
    $data = $response->json();

    // Verifica si las credenciales son válidas
    if ($response->successful()) {
        // Credenciales válidas, redirige al usuario a la página deseada
        return redirect()->route('pagina.deseada');
    } else {
        // Credenciales inválidas, muestra un mensaje de error
        return back()->with('error', 'Correo o contraseña incorrectos');
    }
    }
}

