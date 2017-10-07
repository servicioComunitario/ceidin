<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColaboracionesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'colaboraciones';

    /**
     * Run the migrations.
     * @table colaboraciones
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
            $table->text('descripcion')->nullable();
            $table->float('monto')->nullable();
            $table->text('cedula')->nullable();
            $table->text('rif')->nullable();
            $table->text('motivo');
            $table->dateTime('fecha');
            $table->integer('usuario_id');

            $table->index(["usuario_id"], 'fk_colaboraciones_usuarios1_idx');


            $table->foreign('usuario_id', 'fk_colaboraciones_usuarios1_idx')
                ->references('id')->on('usuarios')
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
