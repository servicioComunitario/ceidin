<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'inscripciones';

    /**
     * Run the migrations.
     * @table inscripciones
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
            $table->text('estatus');
            $table->tinyInteger('fotos');
            $table->tinyInteger('partida_nacimiento');
            $table->tinyInteger('tarjeta_vacunacion');
            $table->tinyInteger('copia_cedula_madre');
            $table->tinyInteger('copia_cedula_padre');
            $table->text('otros');
            $table->float('talla_entrada');
            $table->float('peso_entrada');
            $table->float('talla_salida')->nullable();
            $table->float('peso_salida')->nullable();
            $table->date('fecha_validacion');
            $table->integer('periodo_id');
            $table->integer('alumno_id');
            $table->integer('usuario_id');
            $table->integer('docente_id');
            $table->timestamps();

            $table->index(["alumno_id"], 'fk_inscripciones_alumnos1_idx');

            $table->index(["usuario_id"], 'fk_inscripciones_usuarios1_idx');

            $table->index(["docente_id"], 'fk_inscripciones_docentes1_idx');

            $table->index(["periodo_id"], 'fk_inscripciones_periodos1_idx');


            $table->foreign('periodo_id', 'fk_inscripciones_periodos1_idx')
                ->references('id')->on('periodos')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('alumno_id', 'fk_inscripciones_alumnos1_idx')
                ->references('id')->on('alumnos')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('usuario_id', 'fk_inscripciones_usuarios1_idx')
                ->references('id')->on('usuarios')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('docente_id', 'fk_inscripciones_docentes1_idx')
                ->references('id')->on('docentes')
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
