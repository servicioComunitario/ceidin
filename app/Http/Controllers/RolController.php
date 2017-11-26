<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRolRequest;
use App\Http\Requests\UpdateRolRequest;
use App\Rol;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalUsuarios = Usuario::all()->count();

        $roles =  DB::table('roles as r')
            ->select([
                'r.*',
                DB::raw("COUNT(email) || ' de ' || $totalUsuarios as usuarios"),
            ])
            ->leftJoin('usuarios as u', 'u.rol_id', '=', 'r.id')
            ->groupBy(['r.id'])
            ->get();

        return view("rol.index")->with("roles", $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rol = new Rol();
        return view("rol.create")->with('rol', $rol);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateRolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRolRequest $request)
    {
        try{

            DB::beginTransaction();

            $rol = Rol::create(
                $request->all()
            );
            
            DB::commit();
            session()->flash('msg_success', "El Rol '$rol->nombre' ha sido creado.");
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('rol.edit', $rol->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
        return redirect()->route('rol.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit(Rol $rol)
    {
        $usuarios = Usuario::with('rol')
            ->with('datosBasico')
            ->get();

        return view("rol.edit")->with([
            "rol"      => $rol,
            "usuarios" => $usuarios
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRolRequest  $request
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolRequest $request, Rol $rol)
    {
        try{
            DB::beginTransaction();

            $rol->update(
                $request->all()
            );

            DB::commit();

            session()->flash('msg_info', "El rol '$rol->nombre' ha sido actualizado.");
        } catch (Exception $e) {
            DB::rollback();

            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('rol.edit', $rol->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $rol = rol::find($request->id);

            $rol->delete();

            session()->flash('msg_danger', "El rol '$rol->nombre' ha sido eliminado.");
        } catch (Exception $e) {
            session()->flash('msg_danger', $e->getMessage());
        }

        return redirect()->route('rol.index');
    }
}
