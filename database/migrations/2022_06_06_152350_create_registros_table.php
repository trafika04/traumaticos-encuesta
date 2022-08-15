<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_empresa')->references('id')->on('empresas')->onDelete('cascade');
            $table->string('email')->unique()->nullable();
            $table->text('fecha_inicio')->nullable();
            $table->text('token');
            $table->text('sexo')->nullable();
            $table->text('estado_civil')->nullable();
            $table->text('edad')->nullable();
            $table->text('antiguedad')->nullable();
            $table->text('estudios')->nullable();
            $table->text('tipo_puesto')->nullable();
            $table->text('area')->nullable();
            $table->text('tipo_contratacion')->nullable();
            $table->text('jornada_trabajo')->nullable();
            $table->text('jornada_trabajo_opcional')->nullable();
            $table->text('rotacion_turnos')->nullable();
            $table->text('rotacion_personal')->nullable();
            $table->text('tipo_empleado')->nullable();
            $table->text('experiencia_laboral')->nullable();
            $table->text('item_sc')->nullable();
            $table->text('item_jefe')->nullable();
            $table->text('ets_1')->nullable();
            $table->text('ets_2')->nullable();
            $table->text('ets_3')->nullable();
            $table->text('ets_4')->nullable();
            $table->text('ets_5')->nullable();
            $table->text('ets_6')->nullable();
            $table->text('ets_7')->nullable();
            $table->text('ets_8')->nullable();
            $table->text('ets_9')->nullable();
            $table->text('ets_10')->nullable();
            $table->text('ets_11')->nullable();
            $table->text('ets_12')->nullable();
            $table->text('ets_13')->nullable();
            $table->text('ets_14')->nullable();
            $table->text('ets_15')->nullable();
            $table->text('ets_16')->nullable();
            $table->text('ets_17')->nullable();
            $table->text('ets_18')->nullable();
            $table->text('ets_19')->nullable();
            $table->text('ets_20')->nullable();
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
        Schema::dropIfExists('registros');
    }
}
