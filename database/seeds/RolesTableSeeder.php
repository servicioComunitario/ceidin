<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = ['DIRECTOR', 'SECRETARIA', 'DOCENTE', 'REPRESENTANTE', 'INVITADO'];

    	foreach ($roles as $rol) {
    		DB::table('roles')->insert([
				'nombre'      => $rol,
				'descripcion' => "ROL DE $rol",
				'activo' 	  => true
		    ]);	
    	}
    }
}
