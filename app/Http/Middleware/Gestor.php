<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Rol;

class Gestor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::guard('usuario')->check()) {

            $user = Auth::guard('usuario')->user();
            $role = Rol::find($user->id_rol);
            //dd($role);

            if ($role->nombre == 'Gestor') {
                return $next($request);
            }
        }

        return redirect()->route('login_form')->with('error' , 'Por favor, inicia sesión primero.');

    }
}
