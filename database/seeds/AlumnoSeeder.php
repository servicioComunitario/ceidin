<?php

use Illuminate\Database\Seeder;
use App\Models\Alumno;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	$datosbasicos=array();
     	$datosbasicos[] = [
     		'lugar_nacimiento'			=>	'unare',
     		'procedencia'				=>	'xyz',
     		'nivel'						=>	1,
     		'representante_id'			=>	1,
     		'antecedentes_familiar_id'	=>	1,
     		'antecedentes_medico_id'		=>	1,
     		'otros_dato_id'				=>	1,
     		'datos_basico_id'			=>	2
    	];

    	$datosbasicos[] = [
     		'lugar_nacimiento'			=>	'unare',
     		'procedencia'				=>	'xyz',
     		'nivel'						=>	1,
     		'representante_id'			=>	1,
     		'antecedentes_familiar_id'	=>	1,
     		'antecedentes_medico_id'		=>	1,
     		'otros_dato_id'				=>	1,
     		'datos_basico_id'			=>	3
    	];

    	foreach ($datosbasicos as $key => $value) {
    		Alumno::create($value);
    	}
    }
}
