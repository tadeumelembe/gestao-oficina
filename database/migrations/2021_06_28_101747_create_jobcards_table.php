<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobcards', function (Blueprint $table) {
            $table->id();
	        $table->string('cotacao')->nullable();
	        $table->string('fatura')->nullable();
            $table->string('referencia')->unique();
            $table->integer('kilometragem');
            $table->enum('status', ['Pendente','Em curso', 'Fechado'])->default('Pendente');
            $table->string('notas')->nullable();
            $table->double('valor');
            $table->dateTime('dataInicio')->nullable();
            $table->dateTime('dataFim')->nullable();
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('funcionario_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('car_id')->references('id')->on('cars');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobcards');
    }
}
