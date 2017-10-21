<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePadresAlumnosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'padres_alumnos';

    /**
     * Run the migrations.
     * @table padres_alumnos
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('padre_id')->unsigned();
            $table->integer('alumno_id')->unsigned();

            $table->foreign('padre_id', 'fk_padres_alumnos_padres1_idx')
                ->references('id')->on('padres')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('alumno_id', 'fk_padres_alumnos_alumnos1_idx')
                ->references('id')->on('alumnos')
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
