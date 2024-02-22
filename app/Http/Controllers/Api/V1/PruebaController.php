<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Prueba;
use App\Models\Cita;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class PruebaController extends Controller
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
       
        $messages = [
            'fecha.required' => 'El campo fecha es obligatorio.',
            'fecha.date' => 'El campo fecha tiene que ser date.',
            'informe.required' => 'El campo informe es obligatorio.',
        ];
        $validator = Validator::make($request->all(), [
            'fecha' => 'required|date',
            'id_paciente' => 'required',
            'id_radiologo' => 'required',
            'informe' => 'required|string',
            'id_cita' => 'required',
        ], $messages);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Se encontraron errores de validación.',
                'errors' => $validator->errors()
            ]); 
        }
        
        $validatedData = $validator->validated();
        $prueba = Prueba::create([
            'informe' => $validatedData['informe'],
            'fecha' => $validatedData['fecha'],
            'id_usuario_radiologo' => $validatedData['id_radiologo'],
            'id_usuario_paciente' => $validatedData['id_paciente'],
            'id_cita' => $validatedData['id_cita'],
        ]);
       
        
        if ($request->has('imagesCode') && $request->has('imagesName')){
            foreach ($request->imagesCode as $index => $image) {
          
                $image_parts = explode(";base64,", $image);
                $decodedImage = base64_decode($image_parts[1]);

                $filename = $request->imagesName[$index];
                Storage::disk('public')->put('imagenes/' . $filename, $decodedImage);

                $url = 'imagenes/' . $filename;

                Imagen::create([
                    'id_prueba' => $prueba->id,
                    'imagen' => $url,
                ]);
            }
        }
        $id_cita = $validatedData['id_cita'];
        $cita = Cita::find($id_cita);

        $cita->update([
            'estado' => 'realizada',
        ]);
        
        
        return response()->json(['message' => 'Informacion insertada correctamente .']); 
    }

    public function getPrueba($id){

        $prueba = Prueba::where('id_cita', $id)->first();

    
        if (!$prueba) {
            return response()->json(['error' => 'Prueba no encontrada.'], 404);
        }
        $imagenes = Imagen::where('id_prueba', $prueba->id_prueba)->get();
        $imagenesBase64 = $imagenes->map(function ($imagen) {
            $ruta = Storage::disk('public')->path($imagen->imagen);
            
            if (File::exists($ruta)) {
                
                $tipo = File::mimeType($ruta);
                $archivo = File::get($ruta);
                $base64Image = 'data:' . $tipo . ';base64,' . base64_encode($archivo);

                return [
                    'nombre' => basename($imagen->imagen),
                    'base64' => $base64Image
                ];
            }
            return null;
        });

        return response()->json([
            'informe' => $prueba->informe,
            'imagenes' => $imagenesBase64
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Prueba $prueba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prueba $prueba)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prueba $prueba)
    {
        //
    }
}
