<?php

namespace App\Http\Controllers;
use App\DatosBasico;

use Illuminate\Http\Request;

class DatosBasicoController extends Controller
{
    public function buscar($cedula)
    {
        $datos_basico = DatosBasico::where('cedula', $cedula)->first();

        if (sizeof($datos_basico)) {
            return response()->json(['datos_basico' => $datos_basico, 'code' => 1]);
        }else{
            return response()->json(['datos_basico' => null, 'code' => 0]);
        }
    }
}
