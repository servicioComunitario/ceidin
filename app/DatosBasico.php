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
        'cedula', 'nombre', 'nombre2', 'apellido', 'apellido2', 'sexo', 'fecha_nacimiento', 'ocupacion', 'direccion', 'nacionalidad', 'telefono_celular', 'telefono_fijo'
    ];

    public function usuario()
    {
    	return $this->hasOne(Usuario::class);
    }

    public function padre()
    {
        return $this->hasOne(Padre::class);
    }

    public function representante()
    {
        return $this->hasOne(Representante::class);
    }

    public function alumno()
    {
        return $this->hasOne(Alumno::class);
    }
}
