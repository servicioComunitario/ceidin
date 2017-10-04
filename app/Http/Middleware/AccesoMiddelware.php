<?php

namespace App\Http\Middleware;

use Closure;

class AccesoMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $usuario = $request->user();
        $ruta    = $request->path();
        $metodo  = $request->method();

        if($usuario->hasAcceso($ruta, $metodo)){
            return $next($request);
        }else{
            abort(403);
        }
    }
}
