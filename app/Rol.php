<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'nombre', 'descripcion', 'activo'
    ];

    public function usuarios()
    {
    	return $this->hasMany(Usuario::class);
    }

    public function accesos()
    {
    	return $this->hasMany(Acceso::class);
    }
}
