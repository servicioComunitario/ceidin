<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedenteFamiliar extends Model
{
    protected $table = 'antecedentes_familiares';

    protected $fillable = [
    	'pareja_armonica',
    	'pareja_separada',
    	'vive_con',
    	'hermanos',
    	'religion',
    	'lugar_grupo_familiar',
    	'otros_adultos_casa',
    	'cuidado_por',
    	'tipo_vivienda'
    ];

    /*-------------------------------Relaciones-------------------------------*/
	public function alumno(){
	    return $this->belongsTo(Alumno::class);
	}
	/*------------------------------/Relaciones-------------------------------*/
}
