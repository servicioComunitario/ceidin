<?php

use Illuminate\Database\Seeder;
use App\Models\AntecedenteFamiliar;

class AntecedenteFamiliarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $antecedentesfamiliares=array();
        $antecedentesfamiliares[] = [
        	'pareja_armonica'		=>	1,
        	'pareja_separada'		=>	1,
        	'vive_con'              => 'padre',
            'hermanos'		        =>	1,
        	'religion'				=>	'catolico',
        	'lugar_grupo_familiar'	=>	'no se',
        	'otros_adultos_casa'	=>	'si',
        	'cuidado_por'			=>	'tu mama',
        	'tipo_vivienda'			=>	'rancho'
        ];

    	foreach ($antecedentesfamiliares as $key => $value) {
    		AntecedenteFamiliar::create($value);
    	}
    }
}
