<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Retiro;
use Auth;
use App\Alumno;
use App\Representante;
use App\Usuario;
use App\Solicitud;
use App\Inscripcion;
use PDF;
use View;
use Storage;
use DateTime;

class RetiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes=Solicitud::where('usuario_id','=', Auth::user()->id)->where('tipo','=','retiro')->where('estatus', '!=', 'aprobada')->get();
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
        return view('retiro.create')->with(['representante' => $representante, 'alumnos' => $alumnos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    public function listaSolicitudesRetiro()
    {
        $solicitudes=Solicitud::where('tipo','=','retiro')->get();
        return view('constancia.index')->with(['solicitudes' => $solicitudes, 'bandera' => 'retiros']);
    }

    public function aprobarRetiro(Request $request)
    {
        try{
            $solicitud=Solicitud::aprobarSolicitud($request->id);
            $retiro=Retiro::where('inscripcion_id', '=', $solicitud->inscripcion_id);
            if($retiro){
                $retiro=Retiro::agregarRetiro(date('Y-m-d'),'porque si',$solicitud->inscripcion_id, Auth::user()->id);
            }else{
                session()->flash('msg_danger','el alumno no tiene inscripcion');
            }
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('retiro.solicitudes');
    }

    public function retiro($id)
    {
        // $meses= ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        // $solicitud=Solicitud::findOrFail($id);
        // if ($solicitud->estatus=='aprobada') {
        //     $fecha = date('Y-m-d',strtotime($solicitud->alumno->datosBasico->fecha_nacimiento));
        //     $date = date('Y-m-d');//la fecha del computador
        //     $diff = abs(strtotime($date) - strtotime($fecha));
        //     $edad =  intval ($diff / (365*60*60*24));
        //     $pdf = PDF::loadView('pdf.constancia',['solicitud' => $solicitud, 'edad' => $edad, 'dia' => date("d"), 'mes' => $meses[date("m")], 'ano' => date("Y")]);
        //     $pdf->getDomPDF()->set_option('enable_html5_parser', true);
        //     return $pdf->stream('constancia.pdf');
        // }else{
        //     session()->flash('msg_danger', 'La solicitud debe estar aprobada');
        // }
        // return redirect()->route('retiro.solicitudes');

        $solicitud=Solicitud::findOrFail($id);
        if ($solicitud->estatus=='aprobada') {
            $alumno=Alumno::findOrFail($solicitud->alumno->id);
            $inscripcion= Inscripcion::where('alumno_id','=',$alumno->id)->get()->last();
            $pdf=$this->pdfConstancia($alumno,$inscripcion);
            return $pdf->stream('retiro.pdf');
        }else{
            session()->flash('msg_danger', 'La solicitud debe estar aprobada');
        }
        return redirect()->route('constancia.solicitudes');
    }

    private function pdfRetiro($alumno,$inscripcion){
        $meses= ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        $fecha = date('Y-m-d',strtotime($alumno->datosBasico->fecha_nacimiento));
        $edad=Alumno::edadAlumno($fecha);
        $pdf = PDF::loadView('pdf.retiro',['alumno' => $alumno,'inscripcion' => $inscripcion, 'edad' => $edad, 'dia' => date("d"), 'mes' => $meses[date("m")], 'ano' => date("Y")]);
        $pdf->getDomPDF()->set_option('enable_html5_parser', true);
        return $pdf;
    }

    public function adminRetiro()
    {
        $representantes=Representante::all();
        return view('layouts.representante.admin')->with(['representantes' => $representantes,'tipo' => 'retiro']);
    }

    public function adminAlumnosRetiro($id){
        $alumnos=Alumno::where('representante_id','=',$id)->get();
        return view('layouts.alumno.admin')->with(['alumnos' => $alumnos, 'tipo' => 'retiro']);
    }

    public function adminPdf($id)
    {
        $alumno=Alumno::findOrFail($id);
        $inscripcion= Inscripcion::where('alumno_id','=',$alumno->id)->get()->last();
        $retiro=Retiro::where('inscripcion_id', '=', $inscripcion->id);
        if($retiro){
            $retiro=Retiro::agregarRetiro(date('Y-m-d'),'porque si',$inscripcion->id, Auth::user()->id);
        }
        $pdf=$this->pdfRetiro($alumno,$inscripcion);
        return $pdf->stream('retiro.pdf');
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
    public function destroy($id)
    {
        //
    }
}
