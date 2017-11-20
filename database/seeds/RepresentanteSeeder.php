<?php

use Illuminate\Database\Seeder;
use App\Models\Representante;

class RepresentanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $representantes=array();
        $representantes[] = [
        	'parentesco'		=>	'padre',
        	'datos_basico_id'	=>	1

        ];

    	foreach ($representantes as $key => $value) {
    		Representante::create($value);
    	}
    }
}
