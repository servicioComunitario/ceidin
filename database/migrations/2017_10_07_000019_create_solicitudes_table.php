<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'solicitudes';

    /**
     * Run the migrations.
     * @table solicitudes
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('tipo');
            $table->text('estatus');
            $table->dateTime('fecha_solicitada');
            $table->dateTime('fecha_atendida')->nullable();
            $table->text('cedula_solicitante');
            $table->integer('usuario_id')->unsigned();
            $table->integer('alumno_id')->unsigned();
            $table->integer('inscripcion_id')->unsigned();

            $table->foreign('usuario_id', 'fk_solicitudes_usuarios1_idx')
                ->references('id')->on('usuarios')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('alumno_id', 'fk_solicitudes_alumnos1_idx')
                ->references('id')->on('alumnos')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('inscripcion_id', 'fk_solicitudes_inscripciones1_idx')
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
