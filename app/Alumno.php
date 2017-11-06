<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';

	protected $fillable = [
		'lugar_nacimiento',
		'procedencia',
		'nombre',
		'nivel',
		'representante_id',
		'antecedentes_familiar_id',
		'antecedentes_medico_id',
		'otros_dato_id',
		'datos_basico_id'
	];

	/*-------------------------------Relaciones-------------------------------*/
	public function datosBasico(){
	    return $this->belongsTo(DatosBasico::class);
	}

	/*------------------------------/Relaciones-------------------------------*/
	
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
