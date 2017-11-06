<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Padre extends Model
{
    protected $table = 'padres';

	protected $fillable = [
		'grado_instruccion',
		'difunto',
		'datos_basico_id'
	];

	/*-------------------------------Relaciones-------------------------------*/
	public function datosBasico(){
	    return $this->belongsTo(DatosBasico::class);
	}

	public function representantes(){
	    return $this->belongsTo(Representante::class);
	}

	public function otrosDatos(){
	    return $this->belongsTo(OtrosDato::class);
	}

	public function antecedentesFamiliares(){
	    return $this->belongsTo(AntecedentesFamiliar::class);
	}

	public function antecedentesMedico(){
	    return $this->belongsTo(AntecedentesMedico::class);
	}

	/*------------------------------/Relaciones-------------------------------*/
	
	/*--------------------- Bind Representantes ------------------------*/
	public function getParentescoAttribute()
	{
	    return $this->representante->parentesco;
	}
	/*--------------------- /Bind de Representantes -----------------------*/

	/*--------------------- Bind Otros Datos ------------------------*/
	public function getParentescoAttribute()
	{
	    return $this->representante->parentesco;
	}
	/*--------------------- /Bind Otros Datos -----------------------*/

	/*--------------------- Bind Antecedentes Medicos ------------------------*/
	public function getParentescoAttribute()
	{
	    return $this->representante->parentesco;
	}
	/*--------------------- /Bind Antecedentes Medicos -----------------------*/

	/*--------------------- Bind Antecedentes Familiares ------------------------*/
	public function getParentescoAttribute()
	{
	    return $this->representante->parentesco;
	}
	/*--------------------- /Bind Antecedentes Familiares -----------------------*/

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
