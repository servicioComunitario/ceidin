<?php

use Illuminate\Database\Seeder;
use App\Models\AntecedenteMedico;

class AntecedenteMedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $antecedentesmedicos=array();
     	$antecedentesmedicos[] = [
     		'embarazo_unico'			=>	1,
     		'parto_normal'				=>	1,
     		'prematuro'					=>	1,
     		'edad_control_esfinteres'	=>	1
    	];

    	foreach ($antecedentesmedicos as $key => $value) {
    		AntecedenteMedico::create($value);
    	}
    }
}
