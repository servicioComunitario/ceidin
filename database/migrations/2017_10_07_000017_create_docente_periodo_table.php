<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentePeriodoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'docente_periodo';

    /**
     * Run the migrations.
     * @table docente_periodo
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('docente_id');
            $table->integer('periodo_id');
            $table->tinyInteger('cupos');
            $table->tinyInteger('nivel');
            $table->text('turno');
            $table->text('seccion');

            $table->index(["periodo_id"], 'fk_docente_periodo_periodos1_idx');

            $table->index(["docente_id"], 'fk_docente_periodo_docentes1_idx');


            $table->foreign('docente_id', 'fk_docente_periodo_docentes1_idx')
                ->references('id')->on('docentes')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('periodo_id', 'fk_docente_periodo_periodos1_idx')
                ->references('id')->on('periodos')
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
