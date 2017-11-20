<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;
use App\DatosBasico;

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
        return view('docente.create')->with('docente',$docente);
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
            $inputs_basicos =[
                'cedula'            => $request['cedula'], 
                'nombre'            => $request['nombre'],
                'apellido'          => $request['apellido'],
                'sexo'              => $request['sexo'], 
                'fecha_nacimiento'  => $request['fecha_nacimiento'], 
            ];


            $dato_basico=DatosBasico::create($inputs_basicos);
            $inputs_docente = [
                'estatus' => $request['estatus'],
                'datos_basico_id' => $dato_basico->id,
            ];
            $docente=Docente::create($inputs_docente);
            
            session()->flash('msg_success', "El Doncente '$dato_basico->nombre' ha sido creado.");
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
        return view('docente.edit')->with('docente',$docente);
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
            $dato_basico=DatosBasico::findOrFail($docente->datosBasico->id);
            $dato_basico->cedula=$request['cedula'];
            $dato_basico->nombre=$request['nombre'];
            $dato_basico->apellido=$request['apellido'];
            $dato_basico->sexo=$request['sexo'];
            $dato_basico->fecha_nacimiento=$request['fecha_nacimiento'];
            $dato_basico->save();
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
