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
	     		    DB::table('accesos')->insert([
                        'rol_id' => DB::table('roles')->where('nombre', 'DIRECTOR')->value('id'),
                        'ruta'   => $ruta->uri,
                        'metodo' => $metodo,
                        'nombre' => isset($ruta->action['as']) ? $ruta->action['as']: null
	     		    ]);
     		    }catch(Exception $e){}
     		}
        }
    }
}
