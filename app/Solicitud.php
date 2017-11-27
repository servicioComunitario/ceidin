<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{

	protected $table = 'solicitudes';

    protected $fillable = [
        'tipo', 'estatus', 'fecha_solicitada', 'apellido', 'cedula_solicitante', 'usuario_id', 'alumno_id','inscripcion_id'
    ];

    public function usuario()
    {
    	return $this->belongsTo(Usuario::class);
    }

    public function padre()
    {
        return $this->belongsTo(Padre::class);
    }

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

    public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class);
    }

    public static function aprobarSolicitud($id)
    {
        $solicitud=Solicitud::findOrFail($id);
        $solicitud->estatus='aprobada';
        $solicitud->fecha_atendida=date('Y-m-d');
        $solicitud->save();

        session()->flash('msg_success', "La solicitud fue aprobada stisfactoriamente");
        return $solicitud;
    }
}
