<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccesosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'accesos';

    /**
     * Run the migrations.
     * @table accesos
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('ruta');
            $table->text('metodo');
            $table->text('nombre');
            $table->integer('grupo_id');

            $table->index(["grupo_id"], 'fk_accesos_grupos1_idx');


            $table->foreign('grupo_id', 'fk_accesos_grupos1_idx')
                ->references('id')->on('grupos')
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
