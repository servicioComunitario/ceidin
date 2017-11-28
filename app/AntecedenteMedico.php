<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// OJOOOOOO
// cambiar el attr embrazo_unico que esta en la migracion de antecedentes medicos
class AntecedenteMedico extends Model
{
    protected $table = 'antecedentes_medicos';

    protected $fillable = [
    	'embrazo_unico',
    	'parto_normal',
    	'prematuro',
    	'problema_durante_parto',
    	'desarrollo_primer_anio',
    	'desarrollo_posterior',
    	'problemas_lenguaje',
    	'edad_control_esfinteres',
    	'alergias',
    	'medicamento_fiebre',
    	'enfermedades'
    ];

    /*-------------------------------Relaciones-------------------------------*/
	public function alumno(){
	    return $this->hasMany(Alumno::class);
	}

	public function vacunas(){
	    return $this->belongsTo(vacuna::class);
	}
	/*------------------------------/Relaciones-------------------------------*/
    
}
