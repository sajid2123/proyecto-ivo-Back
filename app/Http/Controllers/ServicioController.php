<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
   
    public function addServicio(){
        $breadcrumbs = [
            ['volver' => 'Volver', 'routa-volver' => route('gestor.servicio')],
            ['nav-opcion-1' => 'Servicios', 'routa-opcion-1' => route('gestor.servicio')],
            ['nav-opcion-2' => 'Alta servicio', 'routa-opcion-2' => null]
        ];
        return view('usuario.gestor.servicio.addServicio', compact('breadcrumbs'));
    }
    public function perfil($id){
        $breadcrumbs = [
            ['volver' => 'Volver', 'routa-volver' => route('gestor.servicio')],
            ['nav-opcion-1' => 'Servicios', 'routa-opcion-1' => route('gestor.servicio')],
            ['nav-opcion-2' => 'Alta servicio', 'routa-opcion-2' => null]
        ];
        $servicio = Servicio::findOrFail($id);
      
        return view('usuario.gestor.servicio.edit', compact('servicio', 'breadcrumbs'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::all();
        return view('usuario.gestor.servicio.servicio', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $breadcrumbs = [
            ['volver' => 'Volver', 'routa-volver' => route('gestor.servicio')],
            ['nav-opcion-1' => 'Servicios', 'routa-opcion-1' => route('gestor.servicio')],
            ['nav-opcion-2' => 'Alta servicio', 'routa-opcion-2' => null]
        ];
        $servicio = Servicio::findOrFail($id);
        return view('usuario.gestor.servicio.datosServicio', compact('servicio', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        //
    }
}
