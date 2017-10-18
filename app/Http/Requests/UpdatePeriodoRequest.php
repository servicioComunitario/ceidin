<?php

namespace App\Http\Requests;

use App\Rules\UnicoPeriodoAbiertoRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePeriodoRequest extends CreatePeriodoRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->reglas['nombre'] = 'required|unique:periodos,nombre,'.$this->periodo->id.','.'id';
        $this->reglas['estado'] = ['required', new UnicoPeriodoAbiertoRule($this->periodo->id)];
        
        return $this->reglas;
    }
}