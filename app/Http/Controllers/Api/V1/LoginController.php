<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash; // Agregado para usar la función Hash
use App\Models\Usuario;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'correo' => 'required|email',
                'password' => 'required',
            ]);

            $credentials = $request->only('correo', 'password');

            // Buscar usuario por correo electrónico
            $user = Usuario::where('correo', $credentials['correo'])->first();

            // Verificar si el usuario existe y la contraseña coincide usando Hash::check()
            if ($user && Hash::check($credentials['password'], $user->password)) {
                // Autenticar al usuario
                Auth::login($user);

                // Generar token JWT
                $token = $user->createToken('LoginBack')->plainTextToken;

                // Responder con los datos del usuario y el token
                return response()->json([
                    'data' => [
                        'user' => $user,
                        'token' => $token,
                    ]
                ], 200);
            } else {
                // Credenciales inválidas
                throw ValidationException::withMessages([
                    'correo' => ['Credenciales inválidas.'],
                ]);
            }
        } catch (ValidationException $e) {
            // Error de validación
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function logOut(){
        $user = auth() -> logout();

        return response()->json("Sesion Cerrada", 201);
    }
}
