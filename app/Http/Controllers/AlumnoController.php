<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Representante;
use App\Padre;
use App\DatosBasico;
use App\AntecedenteMedico;
use App\AntecedenteFamiliar;
use App\OtrosDato;
use App\Usuario;
use Illuminate\Http\Request;
use PDF;
use DB;

// OJOOOOOO
// cambiar el attr embrazo_unico que esta en la migracion de antecedentes medicos
class AlumnoController extends Controller
{

    private $cedula = '';


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();

        return view("alumno.index")->with("alumnos", $alumnos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumno = new Alumno();
        return view("alumno.create")->with('alumno', $alumno);
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

                // guardando el antecedente medico
                $antecedente_medico = AntecedenteMedico::create(
                    $request->antecedente_medico
                );

                // guardando el antecente familiar
                $antecedente_familiar = AntecedenteFamiliar::create(
                    $request->antecedente_familiar
                );

                // guardando los datos basicos
                $otros_datos = OtrosDato::create(
                    $request->otros_datos
                );

		        $representante = Representante::buscar( $request->representante['datos_basico']['cedula'] );

                $padre = Padre::buscar( $request->padre['datos_basico']['cedula'] );


                $madre = Padre::buscar( $request->madre['datos_basico']['cedula'] );


                $datos_alumno = array_merge(
                    $request->alumno, 
                    ['datos_basico_id' => $datos_basico->id],
                    ['antecedentes_familiar_id' => $antecedente_medico->id],
                    ['antecedentes_medico_id' => $antecedente_familiar->id],
                    ['otros_dato_id' => $otros_datos->id],

                    ['representante_id' => $representante->id ]
                );

                $alumno = Alumno::create( 
                    $datos_alumno 
                );

                // $alumno->save();
                
            // $alumno->padres()->attach( $padre->id );
            // $alumno->padres()->attach( $madre->id );
            DB::commit();


            session()->flash('msg_success', "El alumno '$alumno->nombre' '$alumno->apellido' ha sido creado.");
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('alumno.index', $alumno->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    // public function edit(Alumno $alumno)
    public function edit($id)
    {
        $alumno = Alumno::find($id)->with('representante', 'datosBasico')->first();

        return view("alumno.edit")->with("alumno", $alumno);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        try{
            DB::beginTransaction();
                $alumno->update(
                    $request->only('alumno')['alumno']
                );
            DB::commit();

            session()->flash('msg_info', "El alumno '$alumno->nombre' '$alumno->apellido' ha sido actualizado.");
        } catch (Exception $e) {
            DB::rollback();

            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('alumno.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        try {
            $alumno->delete();

            session()->flash('msg_danger', "El alumno '$alumno->nombre' '$alumno->apellido' ha sido eliminado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('alumno.index');
    }


    public function mostrarTodo()
    {
        $alumnos=Alumno::all();
        return view('layouts.alumno.admin')->with(['alumnos' => $alumnos, 'tipo' => 'cedula']);
    }

    public function cedulaPdf($id)
    {
        $alumno=Alumno::findOrFail($id);
        $director=Usuario::where('rol_id','=',1)->first();
        $pdf = PDF::loadView('pdf.cedula',['alumno' => $alumno,'director' => $director]);
        $pdf->getDomPDF()->set_option('enable_html5_parser', true);
        return $pdf->stream('cedula.pdf');
    }

    public function buscar($cedula)
    {

        $this->cedula = $cedula;

        $alumno = Alumno::with([
                        'representante' => function($query){ 
                            $query->with('datosBasico'); 
                    }])
                    ->with([
                        'datosBasico' => function ($query) { 
                            $query->where('cedula', $this->cedula ); 
                    }])
                    ->first();

        if (sizeof($alumno)) {
            return response()->json(['alumno' => $alumno, 'code' => 1]);
        }else{
            return response()->json(['alumno' => null, 'code' => 0]);
        }
    }

}
