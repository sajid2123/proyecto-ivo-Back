<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenController extends Controller
{
    public function eliminarImagen($id){
        $imagen = Imagen::where('id_imagen' , $id)->first();
    
        if($imagen) {
            Storage::disk('public')->delete($imagen->imagen);
            $imagen->delete();
            return response()->json(['message' => 'Imagen eliminada con éxito.'], 200);
        } else {
            return response()->json(['message' => 'Imagen no encontrada.'], 404);
        }
    }
}
