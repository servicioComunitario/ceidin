<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUsuarioRequest extends FormRequest
{
    protected $reglas = [
        'apellido'         => 'required|string|max:50',
        'cedula'           => 'required|integer|min:1|unique:datos_basicos',
        'email'            => 'required|email|max:255|unique:usuarios',
        'fecha_nacimiento' => 'required|date_format:d-m-Y|date',
        'nombre'           => 'required|string|max:50',
        'password'         => 'required|string|min:6|confirmed',
        'rol_id'           => 'required',
        'sexo'             => 'required',
    ];
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->reglas;
    }
}
