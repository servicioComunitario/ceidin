<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRolRequest extends CreateRolRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->reglas['nombre'] = 'required|unique:roles,nombre,'.$this->rol->id.','.'id';
        
        return $this->reglas;
    }
}