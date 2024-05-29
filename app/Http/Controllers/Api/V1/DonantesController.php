<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donante;

class DonantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donante = Donante::all();

        return response()->json(['results' => $donante], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([           
            'nombre' => 'required',
            'apellido1'=>'required',
            'apellido2' => 'required',
            'dni' => 'required',
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'cpostal' => 'required',           
            'direccion' => 'required',
            'contraseña' => 'required',
            
        ]);

        $usuario = new Donante();

        
        $usuario -> nombre = $request -> input('nombre');
        $usuario -> apellido1 = $request -> input('apellido1');
        $usuario -> apellido2 = $request -> input('apellido2');
        $usuario -> dni = $request -> input('dni');
        $usuario -> fecha_nacimiento = $request -> input('fecha_nacimiento');
        $usuario -> telefono = $request -> input('telefono');
        $usuario -> correo = $request -> input('correo');
        $usuario -> cpostal = $request -> input('cpostal');       
        $usuario -> direccion = $request -> input('direccion');       
        $usuario -> contraseña = $request -> input('contraseña');  

        $usuario->save();
        return response()->json(['message' => 'Donante correctamente'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doanente = Donante::findOrFail($id);
        return response()->json(['result' => $doanente], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contraseña' => 'required',
        ]);

        $usuario = Donante::where('correo', $request->input('correo'))
                           ->where('contraseña', $request->input('contraseña'))
                           ->first();

        if ($usuario) {
            $token = $usuario->createToken('auth_token')->plainTextToken;
            return response()->json([
                'message' => 'Inicio de sesión correcto',
                'token' => $token
            ], 200);
        } else {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }
    }
}
