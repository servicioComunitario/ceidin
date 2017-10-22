<?php

namespace App\Http\Controllers;

use App\Acceso;
use App\Http\Requests\CreateAccesoRequest;
use App\Http\Requests\UpdateAccesoRequest;
use App\Rol;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalRutas = count(self::getRutasPrivadas());
        
        $accesos =  DB::table('roles as r')
            ->select([
                'r.id',
                'r.nombre',
                DB::raw("COUNT(ruta) || ' de ' ||$totalRutas as rutas"),
            ])
            ->leftJoin('accesos as a', 'a.rol_id', '=', 'r.id')
            ->groupBy(['r.id', 'r.nombre'])
            ->orderByDesc('rutas')
            ->get();

        return view("acceso.index")->with("accesos", $accesos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Acceso  $acceso
     * @return \Illuminate\Http\Response
     */
    public function edit($idRol)
    {
        $accesos = [];        
        $accesosRol = Acceso::where('rol_id', $idRol)->get();
        $rutasPrivadas = self::getRutasPrivadas();
        $i = 0;
        foreach ($rutasPrivadas as $ruta) {
            $accesos[$i] = [
                'id'      => 0,
                'rol_id'  => $idRol,
                'ruta'    => $ruta->uri,
                'metodos' => implode('|',$ruta->methods),
                'nombre'  => isset($ruta->action['as']) ? $ruta->action['as']: null
            ];

            foreach ($accesosRol as $acceso) {
                if($acceso->ruta==$ruta->uri && $acceso->metodos==implode('|',$ruta->methods)){
                    $accesos[$i]['id'] = $acceso->id;
                    break;
                }
            }

            $i++;
        }

        $rol = Rol::where('id', $idRol)->first();
        Acceso::ordenarAccesosByRuta($accesos);

        return view("acceso.edit")->with([
            "accesos" => json_decode(json_encode($accesos)),
            'rol'     => $rol
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Acceso  $acceso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $acceso)
    {
        
        try{
            $acceso = Acceso::find($request->id);
            
            if($acceso){
                $acceso->delete();
            }else{
                $rol = Acceso::create(
                    $request->all()
                );
            }

            return response()->json(["msj" => "OK"]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Método Prestado para cambiarle el Rol a un Usuario
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $usuario = Usuario::find($request->usuario_id);
            
            $usuario->rol_id = $request->rol_id;

            $usuario->save();

            return response()->json([
                "msj"       => "OK",
                "nombreRol" => $usuario->rol->nombre
            ]);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
