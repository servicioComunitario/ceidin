<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colaboracion extends Model
{
    protected $table = 'colaboraciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion', 'monto', 'cedula','rif', 'motivo', 'fecha', 'usuario_id'
    ];

    public function usuario()
    {
    	return $this->hasOne(Usuario::class);
    }

}
