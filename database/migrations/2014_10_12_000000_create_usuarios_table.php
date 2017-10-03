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
            $table->enum('rol', ['REPRESENTATE', 'DOCENTE', 'SECRETARIA', 'ADMINISTRADOR'])->default('REPRESENTATE');
            $table->text('md5_confirmacion')->default("hay que hgacer el md5 para la confirmacion de cuentas");
            $table->rememberToken();
            $table->timestamps();

            $table->unique(["email"], 'correo_UNIQUE');

            $table->unique(["md5_confirmacion"], 'md5_confirmacion_UNIQUE');
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
