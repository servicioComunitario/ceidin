<?php

namespace App\Http\Controllers\Auth;

use App\DatosBasico;
use App\Http\Controllers\Controller;
use App\Usuario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'cedula'           => 'required|integer|min:1|unique:datos_basicos',
            'nombre'           => 'required|string|max:50',
            'apellido'         => 'required|string|max:50',
            'sexo'             => 'required',
            'fecha_nacimiento' => 'required|date_format:d-m-Y|date',
            'email'            => 'required|string|email|max:255|unique:usuarios',
            'password'         => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        try {
            DB::beginTransaction();
            
            $datosBasico = DatosBasico::create([
                'cedula'           => $data['cedula'],
                'nombre'           => $data['nombre'],
                'apellido'         => $data['apellido'],
                'sexo'             => $data['sexo'],
                'fecha_nacimiento' => $data['fecha_nacimiento']
            ]);

            $rol = $data['email']=='cejonio@gmail.com' ? 'DIRECTOR' : 'REPRESENTANTE';

            $usuario = new Usuario();
            $usuario->email            = $data['email'];
            $usuario->password         = bcrypt($data['password']);
            $usuario->confirmado       = false;
            $usuario->md5_confirmacion = md5($data['email'].$data['cedula'].time());
            $usuario->rol_id           = DB::table('roles')->where('nombre', $rol)->value('id');
            $usuario->datos_basico_id  = $datosBasico->id;
            $usuario->save();

            DB::commit();

            return $usuario;
                
        } catch (Exception $e) {
            DB::rollback();
        }
    }
}
