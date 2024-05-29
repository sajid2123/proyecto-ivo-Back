<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Servicio;
use App\Models\Rol;
use App\Models\Medico;
use App\Models\Gestor;
use App\Models\Radiologo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {          
            return redirect()->intended('/dashboard'); 
        } else {
            return back()->with('error', 'Credenciales incorrectas. Por favor, inténtalo de nuevo.');
        }
    }
    public function logout(Request $request)
    {
         Auth::guard('usuario')->logout();
         return redirect()->route('login_form')->with('logout' , 'Tu sesión ha sido cerrada con éxito.' );
    }
    public function addUsuario()
    {
        $breadcrumbs = [
            ['volver' => 'Volver', 'routa-volver' => route('gestor.usuario')],
            ['nav-opcion-1' => 'Usuarios', 'routa-opcion-1' => route('gestor.usuario')],
            ['nav-opcion-2' => 'Alta Usuario', 'routa-opcion-2' => null]
        ];
        $servicios = Servicio::all();
        $rols = Rol::all();
        return view('usuario.gestor.addUsuario', compact('breadcrumbs', 'servicios', 'rols'));
    }

    public function mostrarUsuarios()
    {
        return view('usuario.gestor.usuarios.usuarios');
    }

    public function mostrarDonacion()
    {
        return view('usuario.gestor.donacion.donacion');
    }

    public function crearDonacion()
    {
        return view('usuario.gestor.donacion.crearDonacion');
    }

    public function editarDonacion()
    {
        return view('usuario.gestor.donacion.editarDonacion');
    }

    public function datosDonacion()
    {
        return view('usuario.gestor.donacion.datosDonacion');
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
        // dd($request);
        $messages = [
            'dni.required' => 'El campo DNI es obligatorio.',
            'dni.string' => 'El DNI debe ser una cadena de texto.',
            'dni.max' => 'El DNI no debe ser mayor a 255 caracteres.',
            'dni.unique' => 'Este DNI ya ha sido registrado.',
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no debe ser mayor a 255 caracteres.',
            'apellido1.required' => 'El campo primer apellido es obligatorio.',
            'apellido1.string' => 'El primer apellido debe ser una cadena de texto.',
            'apellido1.max' => 'El primer apellido no debe ser mayor a 255 caracteres.',
            'apellido2.string' => 'El segundo apellido debe ser una cadena de texto.',
            'sexo.required' => 'El campo sexo es obligatorio.',
            'correo.required' => 'El campo correo es obligatorio.',
            'correo.email' => 'El correo electrónico no tiene un formato válido.',
            'correo.max' => 'El correo no debe ser mayor a 255 caracteres.',
            'correo.unique' => 'Este correo electrónico ya ha sido registrado.',
            'codigoPostal.required' => 'El código postal es obligatorio.',
            'codigoPostal.numeric' => 'El código postal debe ser numérico.',
            'codigoPostal.digits' => 'El código postal debe tener 5 dígitos.',
            'direccion.required' => 'El campo dirección es obligatorio.',
            'direccion.string' => 'La dirección debe ser una cadena de texto.',
            'direccion.max' => 'La dirección no debe ser mayor a 255 caracteres.',
            'fechaNac.required' => 'La fecha de nacimiento es obligatoria.',
            'fechaNac.date' => 'La fecha de nacimiento no tiene un formato válido.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.string' => 'El teléfono debe ser una cadena de texto.',
            'usuario.required' => 'El campo usuario es obligatorio.',
            'usuario.string' => 'El nombre de usuario debe ser una cadena de texto.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser una cadena de texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'servicio.required' => 'El campo servicio es obligatorio.',
            'servicio.exists' => 'El servicio seleccionado no es válido.',
            'rol.required' => 'El campo rol es obligatorio.',
            'rol.exists' => 'El rol seleccionado no es válido.',
        ];
        $validator = Validator::make($request->all(), [
            'dni' => 'required|string|max:255|unique:usuarios',
            'nombre' => 'required|string|max:255',
            'apellido1' => 'required|string|max:255',
            'apellido2' => 'sometimes|string|max:255',
            'sexo' => 'required|string',
            'correo' => 'required|string|email|max:255|unique:usuarios',
            'codigoPostal' => 'required|numeric|digits:5',
            'direccion' => 'required|string|max:255',
            'fechaNac' => 'required|date',
            'telefono' => 'required|numeric|digits:9',
            'usuario' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'rol' => 'required|exists:rols,nombre',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('gestor.add-usuario')
                        ->withErrors($validator)
                        ->withInput();
        }
        $validatedData = $validator->validated();

        $nombreServicio = $request->servicio;
        $nombreRol = $validatedData['rol'];
        $rol = Rol::where('nombre', $validatedData['rol'])->first();

        $user = Usuario::create([
            'dni' => $validatedData['dni'],
            'nombre' => $validatedData['nombre'],
            'correo' => $validatedData['correo'],
            'password' => Hash::make($validatedData['password']),
            'id_rol' => $rol->id_rol,
            'apellido1' => $validatedData['apellido1'],
            'apellido2' => $validatedData['apellido2'],
            'Sexo' => $validatedData['sexo'],
            'codigo_postal' => $validatedData['codigoPostal'],
            'direccion' => $validatedData['direccion'],
            'fecha_nacimiento' => $validatedData['fechaNac'],
            'telefono' => $validatedData['telefono'],
            'nombre_cuenta' => $validatedData['usuario'],
        ]);
        

        $this->anyadirUsuarioEspecifico($nombreRol, $user, $nombreServicio);
        
        return redirect()->route('gestor.add-usuario')->with('success', 'Usuario creado correctamente.');
        
    }
    public function anyadirUsuarioEspecifico($nombreRol, $user, $nombreServicio){

    
        switch($nombreRol){
            case 'Gestor':
                Gestor::create([
                    'id_usuario_gestor' => $user->id_usuario,
                ]);
                break;
            case 'Médico':
                $servicio = Servicio::where('nombre_servicio', $nombreServicio)->first();
                Medico::create([
                    'id_usuario_medico' =>  $user->id_usuario,     
                    'id_usuario_gestor' => Auth::guard('usuario')->user()->id_usuario,
                    'id_servicio' =>   $servicio->id_servicio,          
                ]);
                break;
            case 'Radiólogo':
                $servicio = Servicio::where('nombre_servicio', $nombreServicio)->first();
                Radiologo::create([
                    'id_usuario_radiologo' => $user->id_usuario, 
                    'id_usuario_gestor' => Auth::guard('usuario')->user()->id_usuario,
                    'id_servicio' =>   $servicio->id_servicio,
                ]);
                break;
            case 'Administrativo':
                Administrativo::create([
                    'id_usuario_administrativo' => $user->id_usuario, 
                    'id_usuario_gestor' => Auth::guard('usuario')->user()->id_usuario,
                ]);
                break;
        }
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
    public function edit($id)
    {

        $usuario = Usuario::findOrFail($id);
        $servicios = Servicio::all();
        $rols = Rol::all();
        return view('usuario.gestor.edit', compact('usuario', 'servicios', 'rols'));
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
    public function destroy($id)
    {
        $user = Usuario::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('gestor.usuario')->with('success', 'Usuario eliminado con éxito.');
        } else {
            return redirect()->route('')->with('error', 'Usuario no encontrado.');
        }
    }
    public function perfil($id){
        $breadcrumbs = [
            ['volver' => 'Volver', 'routa-volver' => route('gestor.usuario')],
            ['nav-opcion-1' => 'Usuarios', 'routa-opcion-1' => route('gestor.usuario')],
            ['nav-opcion-2' => 'Alta Usuario', 'routa-opcion-2' => null]
        ];
        $usuario = Usuario::findOrFail($id);
        $servicio = "";
        $rol = Rol::find($usuario->id_rol);
        if($rol->nombre == "Médico"){
            $medico = Medico::find($usuario->id_usuario);
            $servicio = Servicio::find($medico->id_servicio);
        }else if($rol->nombre == "Radiólogo"){
            $radiologo = Radiologo::find($usuario->id_usuario);
            $servicio = Servicio::find($radiologo->id_servicio);
        }
        
        return view('usuario.gestor.perfilUsuario', compact('usuario', 'servicio', 'rol', 'breadcrumbs'));
    }
}
