<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosBasicosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'datos_basicos';

    /**
     * Run the migrations.
     * @table datos_basicos
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('cedula');
            $table->string('nombre', 200);
            $table->string('nombre2', 200)->nullable();
            $table->text('apellido');
            $table->text('apellido2')->nullable();
            $table->char('sexo', 1);
            $table->text('fecha_nacimiento');
            $table->text('ocupacion')->nullable();
            $table->text('direccion')->nullable();
            $table->text('nacionalidad')->nullable();
            $table->text('telefono_celular')->nullable();
            $table->text('telefono_fijo')->nullable();
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
