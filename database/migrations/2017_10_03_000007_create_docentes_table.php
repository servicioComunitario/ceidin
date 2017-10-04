<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'docentes';

    /**
     * Run the migrations.
     * @table docentes
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
            $table->text('seccion');
            $table->text('turno');
            $table->tinyInteger('nivel');
            $table->tinyInteger('cupos');
            $table->integer('periodo_id');

            $table->index(["periodo_id"], 'fk_docentes_periodos1_idx');


            $table->foreign('periodo_id', 'fk_docentes_periodos1_idx')
                ->references('id')->on('periodos')
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
