<?php

namespace App\Http\Controllers;

use App\Padre;
use App\DatosBasico;
use DB;
use Illuminate\Http\Request;

class PadreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $padres = Padre::all();

        return view("padre.index")->with("padres", $padres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $padre = new Padre();
        return view("padre.create")->with('padre', $padre);
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
                $datos_basico = DatosBasico::where('cedula', $request->padre['datos_basico']['cedula'])->first();

                if (!$datos_basico) {
                    session()->flash('msg_danger', "Error. No se encuentra registrado el usuario.");
                    return $this->create();
                }
                
                $padre = new Padre();
                $padre->datos_basico_id = $datos_basico->id;
                $padre->grado_instruccion = $request->padre['grado_instruccion'];
                $padre->difunto = $request->padre['difunto'];
                $padre->save();


/*
                // guardando los datos basicos
                $datos_basico = DatosBasico::create(
                    $request->datos_basico
                );

                // guardando el padre
                $padre = new Padre( $request->padre );

                // relacionando los modelos
                $padre->datos_basico_id = $datos_basico->id;
                $padre->save();
*/
            DB::commit();
            session()->flash('msg_success', "El padre '$padre->nombre' '$padre->apellido' ha sido creado.");
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('padre.index', $padre->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Padres  $padre
     * @return \Illuminate\Http\Response
     */
    public function show(Padre $padre)
    {
        return redirect()->route('padre.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Padres  $padre
     * @return \Illuminate\Http\Response
     */
    public function edit($padre)
    {
        $padre = Padre::find($padre);
        return view("padre.edit")->with("padre", $padre);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Padres  $padre
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Padre $padre)
    public function update(Request $request, Padre $padre)
    {
        try{
            DB::beginTransaction();
                $padre->update(
                    $request->only('padre')['padre']
                );
/*
                $padre = Padre::find($padre);
                $datos_basico = $padre->datosBasico;

                $datos_basico->update(
                    $request->only('datos_basico')['datos_basico']
                );

                $padre->update(
                    $request->only('padre')['padre']
                );
*/
            DB::commit();

            session()->flash('msg_info', "El padre '$padre->nombre' '$padre->apellido' ha sido actualizado.");
        } catch (Exception $e) {
            DB::rollback();

            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('padre.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Padres  $padre
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Padre $padre)
    public function destroy(Padre $padre)
    {
        try {
            dd($padre);
            $padre->delete();

            session()->flash('msg_danger', "El padre '$padre->nombre' '$padre->apellido' ha sido eliminado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('padre.index');
    }

    public function buscar_padre($cedula)
    {
        $padre = DatosBasico::where('cedula', $cedula)
                        ->join('padres', 'padres.datos_basico_id', 'datos_basicos.id')
                        ->first();

        if (sizeof($padre)) {
            return response()->json(['padre' => $padre, 'code' => 1]);
        }else{
            return response()->json(['padre' => null, 'code' => 0]);
        }
    }
}
