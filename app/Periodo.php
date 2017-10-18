<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Periodo extends Model{

    protected $table = 'periodos';

	protected $fillable = [
		'fecha_inicio',
		'fecha_fin',
		'nombre',
		'estado'
	];


	public function getFechaInicioAttribute($fechaInicio)
    {
        return Carbon::parse($fechaInicio)->format('d-m-Y');
    }

    public function setFechaInicioAttribute($fechaInicio)
    {
        $this->attributes['fecha_inicio'] = Carbon::parse($fechaInicio)->toDateString();
    }

    public function getFechaFinAttribute($fechaFin)
    {
        return Carbon::parse($fechaFin)->format('d-m-Y');
    }

    public function setFechaFinAttribute($fechaFin)
    {
        $this->attributes['fecha_fin'] = Carbon::parse($fechaFin)->toDateString();
    }
}
