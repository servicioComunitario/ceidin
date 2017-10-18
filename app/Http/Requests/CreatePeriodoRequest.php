<?php

namespace App\Http\Requests;

use App\Rules\UnicoPeriodoAbiertoRule;
use Illuminate\Foundation\Http\FormRequest;

class CreatePeriodoRequest extends FormRequest
{
    protected $reglas = [
        'fecha_inicio' => 'required|date_format:d-m-Y|before:fecha_fin',
        'fecha_fin'    => 'required|date_format:d-m-Y|after:fecha_inicio',
        'nombre'       => 'required|unique:periodos'
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
        $this->reglas['estado'] = ['required', new UnicoPeriodoAbiertoRule()];

        return $this->reglas;
    }
}
