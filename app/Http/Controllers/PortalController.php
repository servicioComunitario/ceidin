<?php

namespace App\Http\Controllers;

use App\Noticia;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index()
    {
        $noticias = Noticia::with('usuario')
        	->orderBy('principal', 'desc')
        	->orderBy('fecha', 'desc')
        	->get();

        return view("portal.index")->with("noticias", $noticias);
    }
}
