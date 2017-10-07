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
            $table->string('email');
            $table->string('password');
            $table->boolean('confirmado')->default('0');
            $table->text('md5_confirmacion');
            $table->integer('rol_id');
            $table->integer('datos_basico_id');
            $table->rememberToken();
            $table->timestamps();

            $table->index(["rol_id"], 'fk_usuarios_roles1_idx');

            $table->index(["datos_basico_id"], 'fk_usuarios_datos_basicos1_idx');

            $table->unique(["email"], 'correo_UNIQUE');

            $table->unique(["md5_confirmacion"], 'md5_confirmacion_UNIQUE');


            $table->foreign('rol_id', 'fk_usuarios_roles1_idx')
                ->references('id')->on('roles')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('datos_basico_id', 'fk_usuarios_datos_basicos1_idx')
                ->references('id')->on('datos_basicos')
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
