<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Auth;
class UsuarioController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('usuario.login');
    }
    
    public function Login(Request $request){
        
        // dd($request->all());
        $check = $request->all();

        $credentials = [
            'correo' => $request->input('email'), 
            'password' => $request->input('password')
        ];
        // dd($credentials);
        if (Auth::guard('usuario')->attempt($credentials)) {
            return redirect()->route('gestor.dashboard');
        }else {
            return redirect()->back()->with('error', 'La dirección de correo electrónico o la contraseña no son correctos. Verifica tus datos e inténtalo otra vez.')->withInput();
        }
        
    }
    public function logout(Request $request)
     {
         Auth::guard('usuario')->logout();
         return redirect()->route('login_form')->with('logout' , 'Tu sesión ha sido cerrada con éxito.' );
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
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
