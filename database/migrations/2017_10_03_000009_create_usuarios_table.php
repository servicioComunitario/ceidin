<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'usuarios';

    /**
     * Run the migrations.
     * @table usuarios
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('email');
            $table->text('password');
            $table->text('md5_confirmacion')->nullable();
            $table->integer('grupo_id');
            $table->rememberToken();

            $table->index(["grupo_id"], 'fk_usuarios_grupos1_idx');

            $table->unique(["email"], 'correo_UNIQUE');

            $table->unique(["md5_confirmacion"], 'md5_confirmacion_UNIQUE');


            $table->foreign('grupo_id', 'fk_usuarios_grupos1_idx')
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
