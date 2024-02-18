<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UsuarioResource;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = UsuarioResource::collection(Usuario::all());
        return response()->json(['results' => $usuarios], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'dni' => 'nullable|string',
            'nombre' => 'nullable|string',
            'apellido1' => 'nullable|string',
            'apellido2' => 'nullable|string',
            'sexo' => 'nullable|string',
            'fecha_nacimiento' => 'nullable|date',
            'codigo_postal' => 'nullable|string',
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|string',
            'correo' => 'nullable|email',
        ]);

        $usuario->update([
            'dni' => $request->has('dni') ? $request->dni : $usuario->dni,
            'nombre' => $request->has('nombre') ? $request->nombre : $usuario->nombre,
            'apellido1' => $request->has('apellido1') ? $request->apellido1 : $usuario->apellido1,
            'apellido2' => $request->has('apellido2') ? $request->apellido2 : $usuario->apellido2,
            'sexo' => $request->has('sexo') ? $request->sexo : $usuario->sexo,
            'fecha_nacimiento' => $request->has('fecha_nacimiento') ? $request->fecha_nacimiento : $usuario->fecha_nacimiento,
            'codigo_postal' => $request->has('codigo_postal') ? $request->codigo_postal : $usuario->codigo_postal,
            'direccion' => $request->has('direccion') ? $request->direccion : $usuario->direccion,
            'telefono' => $request->has('telefono') ? $request->telefono : $usuario->telefono,
            'correo' => $request->has('correo') ? $request->correo : $usuario->correo,
        ]);

        // Devolver una respuesta exitosa
        return response()->json(['message' => 'Datos del paciente actualizados correctamente'], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
