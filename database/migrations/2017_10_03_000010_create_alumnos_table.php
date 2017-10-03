<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'alumnos';

    /**
     * Run the migrations.
     * @table alumnos
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
            $table->integer('cedula');
            $table->date('fecha_nacimiento');
            $table->text('lugar_nacimiento');
            $table->text('sexo');
            $table->text('procedencia');
            $table->tinyInteger('nivel');
            $table->integer('representante_id');
            $table->integer('antecedentes_familiar_id');
            $table->integer('antecedentes_medico_id');
            $table->integer('otros_dato_id');
            $table->timestamps();

            $table->index(["antecedentes_familiar_id"], 'fk_alumnos_antecedentes_familiares1_idx');

            $table->index(["otros_dato_id"], 'fk_alumnos_otros_datos1_idx');

            $table->index(["representante_id"], 'fk_alumnos_representantes1_idx');

            $table->index(["antecedentes_medico_id"], 'fk_alumnos_antecedentes_medicos1_idx');


            $table->foreign('representante_id', 'fk_alumnos_representantes1_idx')
                ->references('id')->on('representantes')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('antecedentes_familiar_id', 'fk_alumnos_antecedentes_familiares1_idx')
                ->references('id')->on('antecedentes_familiares')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('antecedentes_medico_id', 'fk_alumnos_antecedentes_medicos1_idx')
                ->references('id')->on('antecedentes_medicos')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('otros_dato_id', 'fk_alumnos_otros_datos1_idx')
                ->references('id')->on('otros_datos')
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
