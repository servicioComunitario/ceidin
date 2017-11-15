<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNoticiaRequest extends CreateNoticiaRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->reglas['imagen'] = 'image';
        $this->reglas['imagen-nombre'] = 'required';

        return $this->reglas;
    }
}