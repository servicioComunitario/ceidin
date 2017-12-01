<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Alumno extends Model
{
    protected $table = 'alumnos';

	protected $fillable = [
		'lugar_nacimiento',
		'procedencia',
		'nivel',
		'representante_id',
		'antecedentes_familiar_id',
		'antecedentes_medico_id',
		'otros_dato_id',
		'datos_basico_id'
	];


	public static function buscar($cedula='')
	{
	    $alumno = DatosBasico::where('cedula', $cedula)
			->with('alumno')
			->first();

		if ($alumno) {
			return $alumno->alumno;
		} else{
			return null;
		}

	}

	public function generarCedula()
	{
		$num_hijo = 1;
		$anio_nacimiento = Carbon::parse($this->fecha_nacimiento)->format("y");
		$cedula_madre = $this->madre()->cedula;
		$cedula_alumno = $num_hijo . $anio_nacimiento . $cedula_madre;

		while ( DatosBasico::where('cedula', $cedula_alumno)->first() ) {
			$num_hijo++;
			$cedula_alumno = $num_hijo . $anio_nacimiento . $cedula_madre;
		}

		return $cedula_alumno;
	}

	/*-------------------------------Relaciones-------------------------------*/
	public function datosBasico(){
	    return $this->belongsTo(DatosBasico::class)->withDefault();
	}

	public function representante(){
	    return $this->belongsTo(Representante::class)->withDefault();
	}

	public function otrosDatos(){
	    return $this->belongsTo(OtrosDato::class, 'otros_dato_id')->withDefault();
	}

	public function antecedenteFamiliar(){
	    return $this->belongsTo(AntecedenteFamiliar::class, 'antecedentes_familiar_id')->withDefault();
	}

	public function antecedenteMedico(){
	    return $this->belongsTo(AntecedenteMedico::class, 'antecedentes_medico_id')->withDefault();
	}

	public function padres()
	{
		return $this->belongsToMany(Padre::class, 'padres_alumnos');
	}

	public function padre()
	{
/*
		$this->padres->reject(function ($item) {
			return $item->sexo == 'F';
		});
*/
		return $this->padres->where('sexo','M')->first();
	}

	public function madre()
	{
		return $this->padres->where('sexo','F')->first();
	}
	/*------------------------------/Relaciones-------------------------------*/
		
	/*--------------------- Bind Representantes ------------------------*/
	public function getParentescoAttribute()
	{
	    return $this->representante->parentesco;
	}
	/*--------------------- /Bind de Representantes -----------------------*/

	/*--------------------- Bind Otros Datos ------------------------*/
	public function getContuctasSocioemocionalesAttribute()
	{
	    return $this->otrosDatosantecedenteMedico->contuctas_socioemocionales;
	}
	/*--------------------- /Bind Otros Datos -----------------------*/

	// mutadores
	/*--------------------- Bind Antecedentes Medicos ------------------------*/
	public function getEmbarazoUnicoAttribute()
	{
	    return $this->antecedenteMedico->embarazo_unico;
	}

	public function getPartoNormalAttribute()
	{
	    return $this->antecedenteMedico->parto_normal;
	}

	public function getPrematuroAttribute()
	{
	    return $this->antecedenteMedico->prematuro;
	}

	public function getProblemaDurantePartoAttribute()
	{
	    return $this->antecedenteMedico->problema_durante_parto;
	}

	public function getDesarrolloPrimerAnioAttribute()
	{
	    return $this->antecedenteMedico->desarrollo_primer_anio;
	}

	public function getDesarrolloPosteriorAttribute()
	{
	    return $this->antecedenteMedico->desarrollo_posterior;
	}

	public function getProblemaLenguajeAttribute()
	{
	    return $this->antecedenteMedico->problema_lenguaje;
	}

	public function getEdadControlEsfinteresAttribute()
	{
	    return $this->antecedenteMedico->edad_control_esfinteres;
	}

	public function getAlergiasAttribute()
	{
	    return $this->antecedenteMedico->alergias;
	}

	public function getMedicamentoFiebreAttribute()
	{
	    return $this->antecedenteMedico->medicamento_fiebre;
	}

	public function getEmfermedadesAttribute()
	{
	    return $this->antecedenteMedico->emfermedades;
	}
	/*--------------------- /Bind Antecedentes Medicos -----------------------*/

	/*--------------------- Bind Antecedentes Familiares ------------------------*/
	public function getParejaArmonicaAttribute()
	{
	    return $this->antecedenteFamiliar->pareja_armonica;
	}
	
	public function getViveConAttribute()
	{
	    return $this->antecedenteFamiliar->vive_con;
	}

	public function getParejaSeparadaAttribute()
	{
	    return $this->antecedenteFamiliar->pareja_separada;
	}

	public function getHermanosAttribute()
	{
	    return $this->antecedenteFamiliar->hermanos;
	}

	public function getReligionAttribute()
	{
	    return $this->antecedenteFamiliar->religion;
	}
	
	public function getLugarGrupoFamiliarAttribute()
	{
	    return $this->antecedenteFamiliar->lugar_grupo_familiar;
	}

	public function getOtrosAdultosCasaAttribute()
	{
	    return $this->antecedenteFamiliar->otros_adultos_casa;
	}

	public function getCuidadoPorAttribute()
	{
	    return $this->antecedenteFamiliar->cuidado_por;
	}

	public function getTipoViviendaAttribute()
	{
	    return $this->antecedenteFamiliar->tipo_vivienda;
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



	public static function edadAlumno($fecha)
	{
		$date = date('Y-m-d');//la fecha del computador
        $diff = abs(strtotime($date) - strtotime($fecha));
        $edad =  intval ($diff / (365*60*60*24));
        return $edad;
	}
}
