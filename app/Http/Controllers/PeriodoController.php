<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePeriodoRequest;
use App\Http\Requests\UpdatePeriodoRequest;
use \App\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodos = Periodo::all()->sortByDesc("nombre");

        return view("periodo.index")->with("periodos", $periodos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periodo = new Periodo();
        return view("periodo.create")->with('periodo', $periodo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePeriodoRequest $request)
    {
        try{

            DB::beginTransaction();

            $periodo = Periodo::create(
                $request->all()
            );
            
            DB::commit();
            session()->flash('msg_success', "El Periodo '$periodo->nombre' ha sido creado.");
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('periodo.edit', $periodo->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function show(Periodo $periodo)
    {
        return redirect()->route('periodo.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function edit(Periodo $periodo)
    {
        return view("periodo.edit")->with("periodo", $periodo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeriodoRequest $request, Periodo $periodo)
    {
        try{
            DB::beginTransaction();

            $periodo->update(
                $request->only(
                    'fecha_inicio',
                    'fecha_fin',
                    'nombre',
                    'estado'
                )
            );

            DB::commit();

            session()->flash('msg_info', "El periodo '$periodo->nombre' ha sido actualizado.");
        } catch (Exception $e) {
            DB::rollback();

            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('periodo.edit', $periodo->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $periodo = Periodo::find($request->id);

            $periodo->delete();

            session()->flash('msg_danger', "El periodo '$periodo->nombre' ha sido eliminado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('periodo.index');
    }
}
