<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'confirmado', 'md5_confirmacion', 'rol_id', 'datos_basicos_id', 'remember_token',
    ];

    public function hasAcceso($ruta, $metodo)
    {
        $acceso = Acceso::where('rol_id', $this->rol_id)
            ->where('ruta', $ruta)
            ->where('metodos', 'LIKE',"%$metodo%")
            ->count();
        
        return $acceso;
    }



    /*-------------------------------Relaciones-------------------------------*/
    public function datosBasico(){
        return $this->belongsTo(DatosBasico::class);
    }

    public function rol(){
        return $this->belongsTo(Rol::class);
    }

    public function noticias(){
        return $this->hasMany(Noticia::class);
    }

    public function representante(){
        return $this->hasOne(Representante::class);
    }

    public function colaboraciones(){
        return $this->hasMany(Colaboracion::class);
    }

    public function retiros(){
        return $this->hasMany(Retiro::class);
    }

    public function inscripciones(){
        return $this->hasMany(Noticia::class);
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
