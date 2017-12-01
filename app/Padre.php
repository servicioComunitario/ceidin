<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Padre extends Model
{
    protected $table = 'padres';

	protected $fillable = [
		'grado_instruccion',
		'difunto',
		'datos_basico_id'
	];

	public static function buscar($cedula='')
	{
		
	    $padre = DatosBasico::where('cedula', $cedula)
			->with('padre')
			->first();

		if ($padre) {
			return $padre->padre;
		} else {
			return null;
		}

		/*
		return DatosBasico::where('cedula', $cedula)
            ->join('padre', 'padre.datos_basico_id', 'datos_basicos.id')
            ->first();
        */
	}

	/*-------------------------------Relaciones-------------------------------*/
	public function datosBasico(){
	    return $this->belongsTo(DatosBasico::class)->withDefault();
	}

	public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'padres_alumnos');
    }

	/*------------------------------/Relaciones-------------------------------*/

	// mutadores
	/*--------------------- Bind Datos Basicos ------------------------*/
	public function getCedulaAttribute()
	{
	    return $this->datosBasico->cedula;
	}

	public function getNombreAttribute()
	{
	    return $this->datosBasico->nombre;
	}

	public function getNombre2Attribute()
	{
	    return $this->datosBasico->nombre2;
	}

	public function getApellidoAttribute()
	{
	    return $this->datosBasico->apellido;
	}

	public function getApellido2Attribute()
	{
	    return $this->datosBasico->apellido2;
	}

	public function getSexoAttribute()
	{
	    return $this->datosBasico->sexo;
	}

	public function getFechaNacimientoAttribute()
	{
	    return Carbon::parse($this->datosBasico->fecha_nacimiento)->format('d-m-Y');
	}

	public function getOcupacionAttribute()
	{
	    return $this->datosBasico->ocupacion;
	}

	public function getDireccionAttribute()
	{
	    return $this->datosBasico->direccion;
	}

	public function getNacionalidadAttribute()
	{
	    return $this->datosBasico->nacionalidad;
	}

	public function getTelefonoCelularAttribute()
	{
	    return $this->datosBasico->telefono_celular;
	}

	public function getTelefonoFijoAttribute()
	{
	    return $this->datosBasico->telefono_fijo;
	}
	/*--------------------- /Bind de Datos Basicos -----------------------*/
}
