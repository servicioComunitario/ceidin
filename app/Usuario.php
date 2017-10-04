<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'email', 'password', 'grupo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function grupo(){
        return $this->belongsTo(Grupo::class);
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

    public function hasAcceso()
    {
        return true;
    }

}
