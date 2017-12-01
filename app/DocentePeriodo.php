<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocentePeriodo extends Model
{
    protected $table = 'docente_periodo';

	protected $fillable = [
	    'docente_id', 'periodo_id', 'cupos', 'nivel', 'turno', 'seccion'
	];

    public function docente(){
    	return $this->belongsTo(Docente::class);
    }

    public function periodo(){
    	return $this->belongsTo(Periodo::class);
    }
}
