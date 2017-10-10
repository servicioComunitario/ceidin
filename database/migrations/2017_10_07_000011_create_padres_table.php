<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePadresTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'padres';

    /**
     * Run the migrations.
     * @table padres
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('grado_instruccion');
            $table->boolean('difunto')->default('0');
            $table->integer('datos_basico_id');

            $table->index(["datos_basico_id"], 'fk_padres_datos_basicos1_idx');


            $table->foreign('datos_basico_id', 'fk_padres_datos_basicos1_idx')
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
