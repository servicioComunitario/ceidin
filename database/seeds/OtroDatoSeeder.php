<?php

use Illuminate\Database\Seeder;
use App\Models\OtroDato;

class OtroDatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $otros_datos=array();
        $otros_datos[] = [
        	'conductas_socioemocionales'	=>	'stalin',
        	'juego' 						=>	'guerra',
        	'habitos_independencia' 		=>	'no se',

        ];

    	foreach ($otros_datos as $key => $value) {
    		OtroDato::create($value);
    	}
    }
}
