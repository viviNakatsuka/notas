<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('protocolo_origen',10);   //obligatorio
            $table->string('referencia',10);
            $table->date('fecha_doc')->nullable();
            $table->date('fecha_entrada')->nullable();
            $table->string('asunto',20)->nullable();
            $table->date('fecha_salida')->nullable();
            $table->string('pide_respuesta')->nullable();
            $table->string('estado')->nullable();
            $table->string('observaciones',20)->nullable();
            $table->integer('dto_id')->nullable();
            $table->timestamps( );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
