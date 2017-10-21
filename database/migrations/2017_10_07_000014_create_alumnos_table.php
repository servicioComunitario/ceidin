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
            $table->text('lugar_nacimiento');
            $table->text('procedencia');
            $table->tinyInteger('nivel');
            $table->integer('representante_id')->unsigned();
            $table->integer('antecedentes_familiar_id')->unsigned();
            $table->integer('antecedentes_medico_id')->unsigned();
            $table->integer('otros_dato_id')->unsigned();
            $table->integer('datos_basico_id')->unsigned();

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

            $table->foreign('datos_basico_id', 'fk_alumnos_datos_basicos1_idx')
                ->references('id')->on('datos_basicos')
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
