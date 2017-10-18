<?php

namespace App\Rules;

use App\Periodo;
use Illuminate\Contracts\Validation\Rule;

class UnicoPeriodoAbiertoRule implements Rule
{
    private $idPeriodo;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($idPeriodo = NULL)
    {
        $this->idPeriodo = $idPeriodo;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($value=="ABIERTO"){
            return Periodo::where('estado', 'ABIERTO')
                ->where('id','<>',$this->idPeriodo)
                ->count() ? FALSE : TRUE;    
        }else{
            return TRUE;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Solo puede haber un solo Periodo Escolar "ABIERTO".';
    }
}
