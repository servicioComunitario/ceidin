<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNoticiaRequest;
use App\Http\Requests\UpdateNoticiaRequest;
use App\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::all()->sortByDesc('fecha');

        return view("noticia.index")->with("noticias", $noticias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $noticia = new Noticia();
        return view("noticia.create")->with('noticia', $noticia);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNoticiaRequest $request)
    {
        try{

            DB::beginTransaction();

            $noticia = new Noticia($request->all());
            
            $imagen = $request->imagen;
            $noticia->imagen = time();
            $noticia->fecha = date('Y-m-d H:i:s');
            $noticia->usuario_id = $request->user()->id;
            $noticia->save();
            $noticia->imagen = "$noticia->id.{$imagen->getClientOriginalExtension()}";
            $noticia->save();

            Image::make($request->imagen)
                ->resize(640, 360)
                ->save($noticia->ruta_imagen);

            DB::commit();
            session()->flash('msg_success', "La noticia '$noticia->titulo' ha sido creada.");
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('noticia.edit', $noticia->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        return redirect()->route('noticia.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit($idNoticia)
    {
        //Se hizo así xq el inflector transforma {noticia}  a {noticium} en la creación dinámica de las rutas con recursos
        $noticia = Noticia::find($idNoticia);

        return view("noticia.edit")->with("noticia", $noticia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoticiaRequest $request, $idNoticia)
    {
        //Se hizo así xq el inflector transforma {noticia}  a {noticium} en la creación dinámica de las rutas con recursos
        $noticia = Noticia::find($idNoticia);

        try{
            DB::beginTransaction();

            $noticia->update(
                $request->except(['imagen'])
            );

            if($request->imagen){
                File::delete($noticia->ruta_imagen);
                $noticia->imagen = "$noticia->id.{$request->imagen->getClientOriginalExtension()}";
                $noticia->save();
                Image::make($request->imagen)
                    ->resize(640, 360)
                    ->save($noticia->ruta_imagen);
            }

            DB::commit();

            session()->flash('msg_info', "La noticia '$noticia->titulo' ha sido actualizada.");
        } catch (Exception $e) {
            DB::rollback();

            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('noticia.edit', $noticia->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $noticia = Noticia::find($request->id);
            File::delete($noticia->ruta_imagen);
            $noticia->delete();

            session()->flash('msg_danger', "La noticia '$noticia->titulo' ha sido eliminada.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('noticia.index');
    }
}
