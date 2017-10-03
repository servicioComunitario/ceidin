<?php

use Illuminate\Database\Seeder;

class GruposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$grupos = ['DIRECTORES', 'SECRETARIAS', 'DOCENTES', 'REPRESENTANTES', 'INVITADOS'];

    	for ($i=0; $i < count($grupos); $i++) { 
	        DB::table('grupos')->insert([
				'nombre'      => $grupos[$i],
				'nivel'       => $i+1,
				'descripcion' => "GRUPO DE $grupos[$i]"
		    ]);	
    	}
    }
}
