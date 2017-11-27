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
		public function getContuctasSocioemocionalesAttribute()
		{
		    return $this->otrosDatosantecedenteMedico->contuctas_socioemocionales;
		}
		/*--------------------- /Bind Otros Datos -----------------------*/

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
