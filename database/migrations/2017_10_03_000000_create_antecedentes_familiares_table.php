<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedentesFamiliaresTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'antecedentes_familiares';

    /**
     * Run the migrations.
     * @table antecedentes_familiares
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->tinyInteger('pareja_armonica');
            $table->tinyInteger('pareja_separada');
            $table->text('vive_con');
            $table->tinyInteger('hermanos');
            $table->text('religion');
            $table->text('lugar_grupo_familiar');
            $table->text('otros_adultos_casa');
            $table->text('cuidado_por');
            $table->text('tipo_vivienda');
                    
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
