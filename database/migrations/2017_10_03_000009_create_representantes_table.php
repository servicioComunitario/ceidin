<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepresentantesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'representantes';

    /**
     * Run the migrations.
     * @table representantes
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('nombre');
            $table->text('apellido');
            $table->text('cedua');
            $table->text('parentesco');
            $table->text('direccion');
            $table->text('telefono_fijo');
            $table->text('telefono_cecular');
            $table->integer('usuario_id');
            $table->timestamps();

            $table->index(["usuario_id"], 'fk_representantes_usuarios_idx');


            $table->foreign('usuario_id', 'fk_representantes_usuarios_idx')
                ->references('id')->on('usuarios')
                ->onDelete('restrict')
                ->onUpdate('cascade');
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
