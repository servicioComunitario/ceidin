<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
    protected $table = 'vacunas';

    protected $fillable = [
    	'nombre',
    	'antecedentes_medico_id'
    ];
}
