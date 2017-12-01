<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\DatosBasico;
use App\Inscripcion;
use App\Representante;
use App\Usuario;
use App\DocentePediodo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscripciones = Inscripcion::all();
        return view('inscripcion.index')->with('inscripciones', $inscripciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $inscripcion = new Inscripcion();
        $docentes_periodo = DocentePediodo::all();
        return view('inscripcion.create')->with(['inscripcion' => $inscripcion, 'docentes_periodo' => $docentes_periodo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

                // dd($request);

                $alumno = Alumno::buscar($request->datos_basico['cedula']);
                if ($alumno === null )
                    return redirect()->route('inscripcion.index');

                $datos_inscripcion = array_merge(
                    ['fecha' => getdate()['year'].'-'.getdate()['mon'].'-'.getdate()['mday'] ],
                    ['otros' => 'aqui van otros...'],
                    ['fecha_validacion' => getdate()['year'].'-'.getdate()['mon'].'-'.getdate()['mday'] ],
                    $request->inscripcion, 
                    ['alumno_id' => $alumno->id ],
                    ['usuario_id' => Auth::user()->id]
                );

                $inscripcion = Inscripcion::create( 
                    $datos_inscripcion 
                );

            DB::commit();            
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('inscripcion.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Inscripcion $inscripcion)
    {
        return view('inscripcion.edit')->with('inscripcion', $inscripcion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscripcion $inscripcion)
    {
        return redirect()->route('alumno.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inscripcion $inscripcion)
    {
        try {
            $inscripcion->delete();

            session()->flash('msg_danger', "La inscripción ha sido eliminada correctamente.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('inscripcion.index');
    }
}
