<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioRequest extends CreateUsuarioRequest
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
        $this->reglas['cedula'] = "required|unique:datos_basicos,cedula,{$this->usuario->id},id";
        $this->reglas['email']  = "required|unique:usuarios,email,{$this->usuario->id},id";
        $this->reglas['password'] = $this->password ? 'required|string|min:6|confirmed' : '';

        return $this->reglas;
    }
}
