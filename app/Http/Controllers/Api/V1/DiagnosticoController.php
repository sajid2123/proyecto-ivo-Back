<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\DiagnosticoResource;
use App\Models\Diagnostico;
use App\Models\Paciente;
use App\Models\Cita;
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
            'tratamientos' => 'required',
            'fecha_creacion'=>'required',
            'id_medico' => 'required',
            'sip' => 'required',
        ]);

        $citaDelPaciente = new Cita();
        
        $sip = $request -> input('sip');
        $pacientes = Paciente::where('sip', $sip) -> first();

        $diagnostico = new Diagnostico();

        $diagnostico->informe=$request->input('informe');
        $diagnostico->tratamiento=$request->input('tratamientos');
        $diagnostico->fecha_creacion=$request->input('fecha_creacion');
        $diagnostico->id_medico=$request->input('id_medico');
        $diagnostico->id_paciente=$pacientes->id_usuario_paciente;
        $diagnostico->id_cita=$request->input('id_cita');
        $diagnostico->save();
        

        $citaDelPaciente = Cita::where('id_cita', $request->input('id_cita')) -> first();
        $citaDelPaciente -> estado = 'realizada';

        $citaDelPaciente -> save();
        

        return response()->json(['message' => 'Diagnostico creado correctamente'], 201);
    }

    public function mostrarDiagnostico($idCita){

        $diagnostico = new Diagnostico();

        $diagnostico = Diagnostico::where('id_cita', $idCita) -> first();

        return response()->json($diagnostico, 201);
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'informe' => 'required',
            'tratamiento' => 'required',
           
        ]);

        $diagnostico = Diagnostico::where('id_cita', $id) -> first();
        
        $diagnostico->update([
            'informe' => $request-> input('informe'),
            'tratamiento' => $request-> input('tratamiento'),
        ]);
        
        return response()->json(['message' =>  $diagnostico], 200);
        
    }

    public function mostrarVolante($idCita){
        $diagnostico = new Diagnostico();

        $diagnostico = Diagnostico::where('id_cita', $idCita) -> first();

        $volante = '';

        if($diagnostico != null){
            if($diagnostico -> volante != null){
                $volante = $diagnostico -> volante;
            }
        }

        return response()->json($volante, 201);
    }

    public function actualizarVolante(Request $request, $id)
    {
        $request->validate([
            'volante' => 'required',
        ]);

        $diagnostico = Diagnostico::where('id_cita', $id) -> first();
        
        $diagnostico->update([
            'volante' => $request-> input('volante'),
        ]);
        
        return response()->json(['message' =>  $diagnostico], 200);
        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diagnostico $diagnostico)
    {
        //
    }
}
