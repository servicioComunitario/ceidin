<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosBasico extends Model
{
    protected $table = 'datos_basicos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cedula', 'nombre', 'apellido', 'sexo', 'fecha_nacimiento'
    ];

    public function usuario()
    {
    	return $this->hasOne(Usuario::class);
    }
}
