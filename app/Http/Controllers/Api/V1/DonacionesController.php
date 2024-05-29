<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Donacion;
use App\Models\DonacionRealizada;
use Illuminate\Http\Request;
use App\Http\Resources\V1\DonacionResource;


class DonacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donaciones = Donacion::all();

        return response()->json(['results' => $donaciones], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'objetivo' => 'required',
            'descripcion' => 'required',
            'fecha_limite' => 'required',
            'imagen' => 'nullable',
            'total_donaciones' => 'nullable',
            'total_cantidad' => 'nullable',
        ]);

        $donacion = new Donacion([
            'titulo' => $request->get('titulo'),
            'objetivo' => $request->get('objetivo'),
            'descripcion' => $request->get('descripcion'),
            'fecha_limite' => $request->get('fecha_limite'),
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time().'.'.$imagen->getClientOriginalExtension();
            $rutaImagen = public_path('imagenes\\'.$nombreImagen);
            $imagen->move(public_path('imagenes'), $nombreImagen);
            $donacion->imagen = $rutaImagen;
        }

        $donacion->save();
        return "Donacion creada";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $donacion = Donacion::findOrFail($id);
        return response()->json(['result' => $donacion], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donacion $donacion)
    {
        // Validar los datos recibidos en la solicitud
        $request->validate([
            'titulo' => 'nullable|string',
            'objetivo' => 'nullable|integer',
            'fecha_limite' => 'nullable|date',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|longblob',
        ]);

        // Actualizar los campos de la cita
        if ($request->filled('titulo')) {
            $donacion->titulo = $request->titulo;
        }

        if ($request->filled('objetivo')) {
            $donacion->objetivo = $request->objetivo;
        }

        if ($request->filled('fecha_limite')) {
            $donacion->fecha_limite = $request->fecha_limite;
        }

        if ($request->filled('descripcion')) {
            $donacion->descripcion = $request->descripcion;
        }

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time().'.'.$imagen->getClientOriginalExtension();
            $rutaImagen = public_path('imagenes/'.$nombreImagen);
            $imagen->move(public_path('imagenes'), $nombreImagen);
            $donacion->imagen = $rutaImagen;
        }
        

        // Guardar los cambios en la base de datos
        $donacion->save();

        // Devolver una respuesta exitosa
        return response()->json(['message' => 'Donacion actualizada exitosamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donacion $donacion)
    {
        $donacion->delete();
        return response()->json(null,204);
    }

    public function obtenerDonacion(int $idDonacion)
    {
        $donaciones = Donacion::find($idDonacion);
        return response()->json(['results' => $donaciones], 200);
    }

    public function obtenerDonacionesPorEstadoCompletado()
    {
        $donaciones = Donacion::where('estado', 'Completado')->get();
        return response()->json(['results' => $donaciones], 200);
    }

    public function obtenerDonacionesPorEstadoNoCompletado()
    {
        $donaciones = Donacion::where('estado', 'No completado')->get();
        return response()->json(['results' => $donaciones], 200);
    }

    public function obtenerCantidadDonacionesPorDonacion($idDonacion)
    {
        $cantidadDonacionesPorDonacion = DonacionRealizada::where('idDonacion', $idDonacion)
            ->count();
        $fechasDonacionesPorDonacion = DonacionRealizada::where('idDonacion', $idDonacion)->pluck('fecha');

        return response()->json([
            'cantidad_donaciones_realizadas' => $cantidadDonacionesPorDonacion,
            'fechas_donaciones_realizadas' => $fechasDonacionesPorDonacion
        ]);
    }

}