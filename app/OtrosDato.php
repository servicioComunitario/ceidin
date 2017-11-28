<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtrosDato extends Model
{
    protected $table = 'otros_datos';

    protected $fillable = [
    	'conductas_socioemocionales',
    	'juego',
    	'habitos_independencia'
    ];

    /*-------------------------------Relaciones-------------------------------*/
	public function alumno(){
	    return $this->belongsTo(Alumno::class);
	}
	/*------------------------------/Relaciones-------------------------------*/
}
