<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\Usuario;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $idUsuarioAdministrativo = $request->input('id_usuario_administrativo');

        // Lógica para recuperar pacientes según el ID del administrativo
        $pacientes = Paciente::with('usuario')->where('id_usuario_administrativo', $idUsuarioAdministrativo)->get();

        return response()->json(['pacientes' => $pacientes], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $paciente = new Paciente();

        $user = Usuario::where('dni', $request -> input('dni_paciente'))->first(); // Busca al paciente por su DNI

        // Aqui estamos sacando los datos de request

        $paciente->id_usuario_paciente = $user -> id_usuario;
        $paciente->id_usuario_administrativo = $request -> input('id_admin');
        $paciente->sip = $request -> input('sip');

        $paciente -> save();

        return response()->json(['message' => 'Paciente registrado exitosamente'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paciente = Paciente::with('usuario')->find($id); // Buscar al paciente por su ID

        if (!$paciente) {
            return response()->json(['error' => 'Paciente no encontrado'], 404); // Devolver un error si el paciente no se encuentra
        }

        return response()->json($paciente, 200); // Devolver el paciente como respuesta JSON
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente)
    {


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        //
    }

}
