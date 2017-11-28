<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Alumno;
use App\Representante;
use App\Usuario;
use App\Solicitud;
use App\Inscripcion;
use App\Retiro;
use PDF;
use View;
use Storage;
use DateTime;

class ConstanciaEstudioController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes=Solicitud::where('estatus', '!=', 'aprobada')->where('tipo','=','constancia')->get();
        return view('constancia.index')->with(['solicitudes' => $solicitudes, 'bandera' => 'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $representante=Representante::where('datos_basico_id','=',Auth::user()->datos_basico_id)->first();
        $alumnos=Alumno::where('representante_id','=', $representante->id)->get();
        return view('constancia.create')->with(['representante' => $representante, 'alumnos' => $alumnos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inscripcion= Inscripcion::where('alumno_id','=',$request['alumno_id'])->get()->last();
        if (isset($request->retiro)) {
            try{
                $input=[
                    'tipo'                  => 'retiro',
                    'estatus'               => 'espera',
                    'fecha_solicitada'      => date('Y-m-d'),
                    'cedula_solicitante'    => Auth::user()->datosBasico->cedula,
                    'usuario_id'            => Auth::user()->id,
                    'alumno_id'             => $request['alumno_id'],
                    'inscripcion_id'        => $inscripcion->id
                ];
                $solicitud=Solicitud::create($input);
                
                session()->flash('msg_success', "La solicitud ha sido enviada");
            } catch (Exception $e) {
                session()->flash('msg_danger', $e->getMessage());
            }

            return redirect()->route('retiro.index');
        }else{
            try{
                $input=[
                    'tipo'                  => 'constancia',
                    'estatus'               => 'espera',
                    'fecha_solicitada'      => date('Y-m-d'),
                    'cedula_solicitante'    => Auth::user()->datosBasico->cedula,
                    'usuario_id'            => Auth::user()->id,
                    'alumno_id'             => $request['alumno_id'],
                    'inscripcion_id'        => $inscripcion
                ];
                $solicitud=Solicitud::create($input);
                
                session()->flash('msg_success', "La solicitud ha sido enviada");
            } catch (Exception $e) {
                session()->flash('msg_danger', $e->getMessage());
            }

            return redirect()->route('constancia.index');
        }
    }

    public function adminConstancia()
    {
        $representantes=Representante::all();
        return view('layouts.representante.admin')->with(['representantes' => $representantes, 'tipo' => 'constancia']);
    }

    public function adminAlumnosConstancia($id){
        $alumnos=Alumno::where('representante_id','=',$id)->get();
        return view('layouts.alumno.admin')->with(['alumnos' => $alumnos, 'tipo' => 'constancia']);
    }

    public function adminPdf($id)
    {
        $alumno=Alumno::findOrFail($id);
        $inscripcion= Inscripcion::where('alumno_id','=',$alumno->id)->get()->last();
        $pdf=$this->pdfConstancia($alumno,$inscripcion);
        return $pdf->stream('constancia.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function constancia($id)
    {   
        $solicitud=Solicitud::findOrFail($id);
        if ($solicitud->estatus=='aprobada') {
            $alumno=Alumno::findOrFail($solicitud->alumno->id);
            $inscripcion= Inscripcion::where('alumno_id','=',$alumno->id)->get()->last();
            $pdf=$this->pdfConstancia($alumno,$inscripcion);
            return $pdf->stream('constancia.pdf');
        }else{
            session()->flash('msg_danger', 'La solicitud debe estar aprobada');
        }
        return redirect()->route('constancia.solicitudes');
    }

    private function pdfConstancia($alumno,$inscripcion){
        $meses= ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        $fecha = date('Y-m-d',strtotime($alumno->datosBasico->fecha_nacimiento));
        $edad=Alumno::edadAlumno($fecha);
        $pdf = PDF::loadView('pdf.constancia',['alumno' => $alumno,'inscripcion' => $inscripcion, 'edad' => $edad, 'dia' => date("d"), 'mes' => $meses[date("m")], 'ano' => date("Y")]);
        $pdf->getDomPDF()->set_option('enable_html5_parser', true);
        return $pdf;
    }


    public function listaSolicitudes()
    {
        $solicitudes=Solicitud::where('usuario_id','=', Auth::user()->id)->where('tipo','=','constancia')->get();
        return view('constancia.index')->with(['solicitudes' => $solicitudes, 'bandera' => 'solicitudes']);
    }

    public function aprobarConstancia(Request $request)
    {
        try{
            $solicitud=Solicitud::aprobarSolicitud($request->id);
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('constancia.solicitudes');
    }

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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
