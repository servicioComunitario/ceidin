<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNoticiaRequest extends FormRequest
{
    protected $reglas = [
        'titulo'    => 'required|max:80',
        'resumen'   => 'required|max:160',
        'contenido' => 'required',
        'imagen'    => 'required|image',
        'principal' => 'required',
        'orden'     => 'required|integer|min:-32767|max:32767'
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
