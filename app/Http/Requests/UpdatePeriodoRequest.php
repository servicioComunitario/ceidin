<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePeriodoRequest extends FormRequest
{
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
        return [
            'fecha_inicio' => 'required|date_format:d-m-Y|before:fecha_fin',
            'fecha_fin'    => 'required|date_format:d-m-Y|after:fecha_inicio',
            'nombre'       => 'required|unique:periodos,nombre,'.$this->periodo->id.','.'id',
            'estado'       => 'required'
        ];
    }
}