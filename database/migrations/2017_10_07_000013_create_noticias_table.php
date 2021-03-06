<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'noticias';

    /**
     * Run the migrations.
     * @table noticias
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('titulo');
            $table->text('resumen');
            $table->text('contenido');
            $table->text('imagen');
            $table->dateTime('fecha');
            $table->boolean('principal');
            $table->tinyInteger('orden');
            $table->integer('usuario_id')->unsigned();

            $table->foreign('usuario_id', 'fk_noticias_usuarios1_idx')
                ->references('id')->on('usuarios')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        
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
