<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Representante;
use App\DatosBasico;
use App\AntecedenteMedico;
use App\AntecedenteFamiliar;
use App\OtrosDato;
use Illuminate\Http\Request;
use DB;

// OJOOOOOO
// cambiar el attr embrazo_unico que esta en la migracion de antecedentes medicos
class AlumnoController extends Controller
{
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

                print_r($request->otros_datos);
                echo "<br/><br/>";

                print_r($request->antecedente_medico);
                echo "<br/><br/>";

                print_r($request->antecedente_familiar);
                echo "<br/><br/>";

                echo $request->representante['datos_basico']['cedula'];
                echo "<br/><br/>";

                print_r( Representante::buscar( $request->representante['datos_basico']['cedula'] ) );
                echo "<br/><br/>";

                echo $request->padre['datos_basico']['cedula'];
                echo "<br/><br/>";

                echo $request->madre['datos_basico']['cedula'];
                echo "<br/><br/>";

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

                $padre = Representante::buscar( $request->padre['datos_basico']['cedula'] );


                $madre = Representante::buscar( $request->madre['datos_basico']['cedula'] );


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


                echo $request->madre['datos_basico']['cedula'];
                echo $request->madre['datos_basico']['cedula'];
                echo $request->madre['datos_basico']['cedula'];
                echo $request->madre['datos_basico']['cedula'];
                echo "<br/><br/>";

                // dd($alumno);
                
                $alumno->save();
                


                // dd($request);
            DB::commit();

            // $alumno->padres()->attach( $padre->id );
            // $alumno->padres()->attach( $madre->id );

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //
    }
}
