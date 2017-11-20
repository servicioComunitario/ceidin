<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';

	protected $fillable = [
	    'id', 'estatus', 'datos_basico_id'
	];

    public function datosBasico(){
    	return $this->belongsTo(DatosBasico::class);
    }
}
