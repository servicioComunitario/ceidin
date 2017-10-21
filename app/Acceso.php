<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acceso extends Model
{
	protected $table = 'accesos';

	protected $fillable = [
	    'ruta', 'metodos', 'rol_id'
	];

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public static function ordenarAccesosByRuta(&$accesos)
    {
    	return usort($accesos, 'self::pp');
    	//return $accesos;
    }

    private static function pp($a,$b)
    {
    	return ($a["ruta"] <= $b["ruta"]) ? -1 : 1;
    }

}
