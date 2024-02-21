<?php

namespace App\Http\Controllers;

use App\Models\Gestor;
use Illuminate\Http\Request;
use App\Models\Rol;
use App\Models\Usuario;

class GestorController extends Controller
{

    public function dashboard(Request $request){

        $tipo_usuario = $request->input('tipo_usuario', 'Médico'); 
        $rol = Rol::where('nombre', $tipo_usuario)->first();
        $usuarios = Usuario::where('id_rol', $rol->id_rol)->get();
        return view('usuario.gestor.dashboard', compact('usuarios', 'tipo_usuario'));
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Gestor $gestor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gestor $gestor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gestor $gestor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gestor $gestor)
    {
        //
    }

    public function Nav(){
        return view('usuario.gestor.nav');
    }
}
