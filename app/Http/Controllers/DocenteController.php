<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;
use App\DatosBasico;
use App\Usuario;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes= Docente::all();
        return view('docente.index')->with('docentes',$docentes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $docente = new Docente();
        $docentes=Docente::all();
        $docentes=Docente::arrayDocente($docentes);
        $usuarios=Usuario::whereNotIn('datos_basico_id',$docentes)->get();
        return view('docente.create')->with(['docente' => $docente, 'usuarios' => $usuarios]);
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
            $docente=Docente::create($request->all());
            
            session()->flash('msg_success', "El Doncente '$docente->datosBasico->nombre' ha sido creado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('docente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docente=Docente::findOrFail($id);
        $docentes=Docente::all();
        $docentes=Docente::arrayDocente($docentes);
        $docentes=Docente::docenteEditar($docentes,$docente->datos_basico_id);
        $usuarios=Usuario::whereNotIn('datos_basico_id',$docentes)->get();
        return view('docente.edit')->with(['docente' => $docente, 'usuarios' => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $docente=Docente::findOrFail($id);
            $docente->datos_basico_id=$request['datos_basico_id'];
            $docente->estatus=$request['estatus'];
            $docente->save();
            
            session()->flash('msg_success', "El Doncente '$dato_basico->nombre' ha sido editado correctamente.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('docente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $docente = Docente::findOrFail($request->id);

            $docente->delete();

            session()->flash('msg_danger', "El docente '$docente->nombre' ha sido eliminado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('docente.index');
    }
}
