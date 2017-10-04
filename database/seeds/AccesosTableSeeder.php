<?php

use Illuminate\Database\Seeder;

class AccesosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   		
        $rutas = Route::getRoutes()->getRoutes();
     	foreach ($rutas as $ruta) {
     		foreach ($ruta->methods as $metodo) {
     		    try{
	     		    DB::table('accesos_usuarios')->insert([
						'grupo_id'   => DB::table('grupos')->where('nombre', 'DIRECTORES')->value('id'),
						'ruta'       => $ruta->uri,
						'metodo'     => $metodo,
						'nombre'     => isset($ruta->action['as']) ? $ruta->action['as']: null
	     		    ]);
     		    }catch(Exception $e){}
     		}
        }
    }
}
