<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table = 'noticias';

    protected $fillable = [
        'titulo', 
        'resumen', 
        'contenido', 
        'imagen', 
        'fecha', 
        'principal', 
        'orden'
    ];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function getRutaImagenAttribute()
    {
        return 'images/noticias/'.$this->imagen;
    }

    public function guardarImagen($imagen=NULL)
    {
        if(!$imagen){
            $imagen = $this->$imagen;
        }

        

        dd($imagen);

    }
}
