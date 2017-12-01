<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;
use App\Periodo;
use App\DocentePeriodo;

class DocentePeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodos = Periodo::all()->sortByDesc("nombre");

        return view("docente_periodo.index")->with("periodos", $periodos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

            $docente_periodo=DocentePeriodo::create($request->all());
            
            session()->flash('msg_success', "El Doncente ha sido asignadio.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('docente_periodo.show', ['id' => $request['periodo_id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docente_periodo=DocentePeriodo::where('periodo_id','=',$id)->get();
        $periodo=Periodo::findOrFail($id);
        $arreglo_doncentes=array();
        if (count($docente_periodo)>0) {
            foreach ($docente_periodo as $key => $value) {
                array_push($arreglo_doncentes,$value->docente_id);
            }
            $docentes_sin_asignar=Docente::whereNotIn('id',$arreglo_doncentes)->get();
        }else{
            $docentes_sin_asignar=Docente::all();    
        }
        return view('docente_periodo.docente_periodo_index')->with(['docente_periodo' => $docente_periodo, 'periodo' => $periodo, 'docentes_sin_asignar' => $docentes_sin_asignar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
            $input=json_decode($request->id,true);

            $docente_periodo=DocentePeriodo::where('periodo_id','=',$input['periodo_id'])->where('docente_id','=',$input['docente_id'])->delete();

            session()->flash('msg_danger', "El docente ha sido eliminado del periodo");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('docente_periodo.show', ['id' => $input['periodo_id']]);

    }
}
