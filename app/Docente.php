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

    public static function arrayDocente($docentes)
    {
    	$arreglo_docente=array();
    	foreach ($docentes as $key => $value) {
    		array_push($arreglo_docente,$value->datos_basico_id);
    	}
    	return $arreglo_docente;
    }

    public static function docenteEditar($docentes,$docente_id)
    {
        $n=-1;
        foreach ($docentes as $key => $value) {
            if($value==$docente_id){
                $n=$key;
            }
        }
        unset($docentes[$n]);
        return $docentes;
    }

}
