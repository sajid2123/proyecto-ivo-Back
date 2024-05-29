<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $codigo = rand(100000, 999999);

        $correoDestino = $request->input('correo');

        $details = [
            'title' => 'Este es tu codigo para confirmar la donacion',
            'body' => 'Tu código de confirmación es: ' . $codigo,
        ];

        Mail::to($correoDestino)->send(new ContactMail($details));

        return response()->json([
            'message' => 'Correo enviado correctamente',
            'codigoVerificacion' => $codigo
        ], 200);
    }
}
