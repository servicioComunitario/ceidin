<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePadresTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'padres';

    /**
     * Run the migrations.
     * @table padres
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
            $table->text('nombre');
            $table->text('apellido');
            $table->date('fecha_nacimiento');
            $table->text('nacionalidad');
            $table->text('grado_instruccion');
            $table->text('ocupacion');
            $table->text('direccion');
            $table->text('telefono');
            $table->text('sexo');
        
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
