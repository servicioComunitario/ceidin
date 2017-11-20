<?php

use Illuminate\Database\Seeder;
use App\Models\DatoBasico;

class DatoBasicoSeeder extends Seeder
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
     		'cedula' 			=> '1234',
     		'nombre' 			=> 'hijo1',
     		'apellido'			=> 'hijo1',
     		'sexo' 				=> 'M',
     		'fecha_nacimiento' 	=> '15-5-2000'
    	];

    	$datosbasicos[] = [
     		'cedula' 			=> '5678',
     		'nombre' 			=> 'hijo2',
     		'apellido'			=> 'hijo2',
     		'sexo' 				=> 'F',
     		'fecha_nacimiento' 	=> '15-5-2000'
    	];

    	foreach ($datosbasicos as $key => $value) {
    		DatoBasico::create($value);
    	}
    }
}
