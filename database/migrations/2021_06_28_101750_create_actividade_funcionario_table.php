<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadeFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividade_funcionario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('actividade_id');
            $table->unsignedBigInteger('funcionario_id');
            $table->date('dataInicio')->nullable();
            $table->date('dataFim')->nullable();
            $table->string('tarefa');
            $table->enum('status', ['pending', 'progress', 'completed', 'stopped', 'cancelled'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('actividade_id')->references('id')->on('actividades');
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
        Schema::dropIfExists('actividade_funcionario');
    }
}
