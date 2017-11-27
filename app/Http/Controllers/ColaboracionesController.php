<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Colaboracion;

class ColaboracionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colaboraciones= Colaboracion::all();
        return view('colaboracion.index')->with('colaboraciones',$colaboraciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colaboracion = new Colaboracion();
        return view('colaboracion.create')->with(['colaboracion' => $colaboracion]);
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
            $colaboracion=Colaboracion::create($request->all());
            
            session()->flash('msg_success', "La colaboracion ha sido creado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('colaboracion.index');
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
        $colaboracion=Colaboracion::findOrFail($id);
        return view('colaboracion.edit')->with(['colaboracion' => $colaboracion]);
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
            $colaboracion = Colaboracion::FindOrFail($id);
            $input = $request->all();
            $colaboracion->fill($input)->save();
            $colaboracion->save();
            
            session()->flash('msg_success', "La colaboracion ha sido editada correctamente.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('colaboracion.index');
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
            $colaboracion = Colaboracion::findOrFail($request->id);

            $colaboracion->delete();

            session()->flash('msg_danger', "La colaboracion ha sido eliminada.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('colaboracion.index');
    }
}
