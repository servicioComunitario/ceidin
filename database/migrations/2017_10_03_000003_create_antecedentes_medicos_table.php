<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedentesMedicosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'antecedentes_medicos';

    /**
     * Run the migrations.
     * @table antecedentes_medicos
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->tinyInteger('embrazo_unico');
            $table->tinyInteger('parto_normal');
            $table->tinyInteger('prematuro');
            $table->text('problema_durante_parto')->nullable();
            $table->text('desarrollo_primer_anio')->nullable();
            $table->text('desarrollo_posterior')->nullable();
            $table->text('problemas_lenguaje')->nullable();
            $table->tinyInteger('edad_control_esfinteres');
            $table->text('alergias')->nullable();
            $table->text('medicamento_fiebre')->nullable();
            $table->text('enfermedades')->nullable();
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
