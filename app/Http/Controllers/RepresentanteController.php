<?php

namespace App\Http\Controllers;

use App\Representante;
use App\DatosBasico;
use DB;
use Illuminate\Http\Request;

class RepresentanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $representantes = Representante::all();

        return view("representante.index")->with("representantes", $representantes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $representante = new Representante();
        $personas = DatosBasico::orderBy('nombre')
                    ->get()
                    ->reject(function($persona){ 
                        if($persona->alumno || $persona->representante ) 
                            return $persona; 
                    });

        return view("representante.create")->with(['representante' => $representante, 'personas' => $personas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
                $datos_basico = DatosBasico::where('cedula', $request->representante['datos_basico']['cedula'])->first();

                if (!$datos_basico) {
                    session()->flash('msg_danger', "Error. No se encuentra registrado el usuario.");
                    return $this->create();
                }
                
                $representante = new Representante();
                $representante->datos_basico_id = $datos_basico->id;
                $representante->parentesco = $request->representante['parentesco'];
                $representante->save();

/*
                // guardando los datos basicos
                $datos_basico = DatosBasico::create(
                    $request->datos_basico
                );

                // guardando el representante
                $representante = new Representante( $request->representante );

                // relacionando los modelos
                $representante->datos_basico_id = $datos_basico->id;
                $representante->save();
*/
            DB::commit();
            session()->flash('msg_success', "El representante '$representante->nombre' '$representante->apellido' ha sido creado.");
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('representante.index', $representante->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Representante  $representante
     * @return \Illuminate\Http\Response
     */
    public function show(Representante $representante)
    {
        return redirect()->route('representante.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Representante  $representante
     * @return \Illuminate\Http\Response
     */
    // public function edit(Representante $representante)
    public function edit(Representante $representante)
    {
        return view("representante.edit")->with("representante", $representante);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Representante  $representante
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Representante $representante)
    public function update(Request $request, Representante $representante)
    {
        try{
            DB::beginTransaction();
                $representante->update(
                    $request->only('representante')['representante']
                );

/*
                $representante = Representante::find($representante);
                $datos_basico = $representante->datosBasico;

                $datos_basico->update(
                    $request->only('datos_basico')['datos_basico']
                );

                $representante->update(
                    $request->only('representante')['representante']
                );
*/
            DB::commit();

            session()->flash('msg_info', "El representante '$representante->nombre' '$representante->apellido' ha sido actualizado.");
        } catch (Exception $e) {
            DB::rollback();

            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('representante.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Representante  $representante
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Representante $representante)
    public function destroy(Request $request)
    {
        try {
            $representante = Representante::find($request->id);
            $representante->delete();

            session()->flash('msg_danger', "El representante '$representante->nombre' '$representante->apellido' ha sido eliminado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('representante.index');
    }

    public function buscar_representante($cedula)
    {
        // DatosBasico::where('cedula', '654987')->with('representante')->first();

        $representante = DatosBasico::where('cedula', $cedula)
                        ->join('representantes', 'representantes.datos_basico_id', 'datos_basicos.id')
                        ->first();

        if (sizeof($representante)) {
            return response()->json(['representante' => $representante, 'code' => 1]);
        }else{
            return response()->json(['representante' => null, 'code' => 0]);
        }
    }

}
