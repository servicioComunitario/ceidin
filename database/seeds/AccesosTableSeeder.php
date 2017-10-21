<?php

use App\Http\Controllers\Controller;
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
   		
        $rutas = Controller::getRutasPrivadas();
     	foreach ($rutas as $ruta) {
 		    try{
     		    DB::table('accesos')->insert([
                    'rol_id'  => DB::table('roles')->where('nombre', 'DIRECTOR')->value('id'),
                    'ruta'    => $ruta->uri,
                    'metodos' => implode('|',$ruta->methods),
                    'nombre'  => isset($ruta->action['as']) ? $ruta->action['as']: null
     		    ]);
 		    }catch(Exception $e){}
        }
    }
}
