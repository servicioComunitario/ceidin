<?php

namespace App\Http\Controllers;

use App\Noticia;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index()
    {
        $noticiasSlider = Noticia::with('usuario')
        	->orderBy('orden')
        	->where('principal', true)
        	->get();

        $noticiasSidebar = Noticia::with('usuario')
        	->orderBy('created_at', 'desc')
        	->get();

        return view("portal.index")->with([
        	'noticiasSlider'  => $noticiasSlider,
        	'noticiasSidebar' => $noticiasSidebar
        ]);
    }
}
