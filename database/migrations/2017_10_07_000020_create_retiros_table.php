<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetirosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'retiros';

    /**
     * Run the migrations.
     * @table retiros
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('fecha');
            $table->text('motivo');
            $table->integer('inscripcion_id');
            $table->integer('usuario_id');

            $table->index(["inscripcion_id"], 'fk_retiros_inscripciones1_idx');

            $table->index(["usuario_id"], 'fk_retiros_usuarios1_idx');


            $table->foreign('usuario_id', 'fk_retiros_usuarios1_idx')
                ->references('id')->on('usuarios')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('inscripcion_id', 'fk_retiros_inscripciones1_idx')
                ->references('id')->on('inscripciones')
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
