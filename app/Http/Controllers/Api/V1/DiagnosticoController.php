<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\DiagnosticoResource;
use App\Models\Diagnostico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'informe' => 'required',
            'tratamiento' => 'required',
            'fecha_creacion'=>'required',
            'id_medico' => 'required',
            'sip' => 'required',
        ]);
        
        $diagnostico = new Diagnostico();
        $sip = $request -> input('sip');
        $pacientes = Paciente::where('sip', $sip) -> first();

        $diagnostico->informe=$request->input('informe');
        $diagnostico->tratamiento=$request->input('tratamiento');
        $diagnostico->fecha_creacion=$request->input('fecha_creacion');
        $diagnostico->id_medico=$request->input('id_medico');
        $diagnostico->id_paciente=$pacientes->id_usuario_paciente;

        $diagnostico->save();

        return response()->json(['message' => 'Diagnostico creado correctamente'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Diagnostico $diagnostico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diagnostico $diagnostico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diagnostico $diagnostico)
    {
        //
    }
}
