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
                // guardando los datos basicos
                $datos_basico = DatosBasico::create(
                    $request->datos_basico
                );

                // guardando el padre
                $padre = new Padre( $request->padre );

                // relacionando los modelos
                $padre->datos_basico_id = $datos_basico->id;
                $padre->save();            
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
    public function update(Request $request, $padre)
    {
        try{
            DB::beginTransaction();

                $padre = Padre::find($padre);
                $datos_basico = $padre->datosBasico;

                $datos_basico->update(
                    $request->only('datos_basico')['datos_basico']
                );

                $padre->update(
                    $request->only('padre')['padre']
                );

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
    public function destroy(Request $request)
    {
        try {
            $padre = Padre::find($request->id);

            $padre->delete();

            session()->flash('msg_danger', "El padre '$padre->nombre' '$padre->apellido' ha sido eliminado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('padre.index');
    }
}
