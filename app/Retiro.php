<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retiro extends Model
{
    protected $table = 'retiros';

    protected $fillable = [
        'fecha', 'motivo','usuario_id','inscripcion_id'
    ];

    public function usuario()
    {
    	return $this->belongsTo(Usuario::class);
    }

    public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class);
    }

    public static function agregarRetiro($fecha,$motivo,$inscripcion_id,$usuario_id)
    {
        $input=[
                'fecha' => $fecha,
                'motivo' => $motivo,
                'inscripcion_id' => $inscripcion_id,
                'usuario_id' => $usuario_id,
        ];
        $retiro=Retiro::create($input);
        return $retiro;
    }
}
