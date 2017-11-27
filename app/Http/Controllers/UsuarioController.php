<?php

namespace App\Http\Controllers;

use App\DatosBasico;
use App\Http\Requests\CreateUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Rol;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::with('datosBasico')
            ->get();

        return view("usuario.index")->with("usuarios", $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = new Usuario();
        $roles = Rol::all();

        return view("usuario.create")->with([
            'usuario' => $usuario,
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateUsuarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUsuarioRequest $request)
    {
        try{
            DB::beginTransaction();

            $datosBasico = DatosBasico::create([
                'cedula'           => $request->cedula,
                'nombre'           => $request->nombre,
                'apellido'         => $request->apellido,
                'sexo'             => $request->sexo,
                'fecha_nacimiento' => $request->fecha_nacimiento
            ]);

            $usuario = new Usuario();
            $usuario->email            = $request->email;
            $usuario->password         = bcrypt($request->password);
            $usuario->confirmado       = false;
            $usuario->md5_confirmacion = md5($request->email.$request->cedula.time());
            $usuario->rol_id           = $request->rol_id;
            $usuario->datos_basico_id  = $datosBasico->id;
            $usuario->save();
            
            DB::commit();
            session()->flash('msg_success', "El Usuario '$usuario->email' ha sido creado.");
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('usuario.edit', $usuario->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('usuario.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        $roles = Rol::all();

        return view("usuario.create")->with([
            'usuario' => $usuario,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsuarioRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        try{
            DB::beginTransaction();

            $usuario->datosBasico->update(
                $request->all()
            );

            $usuario->email    = $request->email;
            $usuario->rol_id   = $request->rol_id;

            if($request->password){
                $usuario->password = bcrypt($request->password);
            }

            $usuario->save();

            DB::commit();

            session()->flash('msg_info', "El usuario '$usuario->nombre' ha sido actualizado.");
        } catch (Exception $e) {
            DB::rollback();

            session()->flash('msg_danger', $e->getMessage());
        }
        return redirect()->route('usuario.edit', $usuario->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $usuario = Usuario::find($request->id);

            $usuario->delete();

            session()->flash('msg_danger', "El usuario '$usuario->nombre' ha sido eliminado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('usuario.index');
    }
}