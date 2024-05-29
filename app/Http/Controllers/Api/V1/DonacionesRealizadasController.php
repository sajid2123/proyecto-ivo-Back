<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonacionRealizada;
use App\Http\Resources\V1\DonacionRealizadaResource;

class DonacionesRealizadasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donacionesRealizadas = DonacionRealizada::all();
        return DonacionRealizadaResource::collection($donacionesRealizadas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([           
            'idDonante'=>'',
            'idDonacion' => 'required',
            'fecha' => 'required',
            'cantidad_donada' => 'required',         
        ]);

        $usuario = new DonacionRealizada();

        
        $usuario -> idDonante = $request -> input('idDonante');
        $usuario -> idDonacion = $request -> input('idDonacion');
        $usuario -> fecha = $request -> input('fecha');
        $usuario -> cantidad_donada = $request -> input('cantidad_donada');

        $usuario->save();
        return response()->json(['message' => 'Donacion realizada correctamente'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
