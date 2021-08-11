<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->date('dataInicio')->nullable();
            $table->string('antesPhoto')->nullable();
            $table->date('depoisPhoto')->nullable();
            $table->date('dataFim')->nullable();
            $table->unsignedBigInteger('jobCard_id');
            $table->enum('area', ['Mecanica Geral','Bate chapa','Pintura']);
            $table->double('preco')->default(0.0);
            $table->enum('status', ['Pendente','Em curso', 'Completo'])->default('Pendente');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('jobCard_id')->references('id')->on('jobcards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades');
    }
}
