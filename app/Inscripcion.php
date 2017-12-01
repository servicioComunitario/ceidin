<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';

    protected $fillable = [
        'fecha',
        'estatus',
        'fotos',
        'partida_nacimiento',
        'tarjeta_vacunacion',
        'copia_cedula_madre',
        'copia_cedula_padre',
        'otros',
        'talla_entrada',
        'peso_entrada',
        'talla_salida',
        'peso_salida',
        'cedula_representante',
        'fecha_validacion',
        'alumno_id',
        'usuario_id',
        'docente_periodo_id'
    ];

    /************************** Relaciones ****************************/
    public function usuario(){
        return $this->belongsTo(Usuario::class)->withDefault();
    }

    public function alumno(){
        return $this->belongsTo(Alumno::class)->withDefault();
    }

    public function docentePeriodo(){
        return $this->belongsTo(DocentePediodo::class)->withDefault();
    }

    //public function (){
    //    return $this->belongsTo(DocentePeriodo::class, (uno, la_otra));
    //}

}
