<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumiveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumiveis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('quantidade');
            $table->double('custo', 8,2)->nullable();
            $table->string('notas')->nullable();
            $table->unsignedBigInteger('actividade_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('actividade_id')->references('id')->on('actividades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumiveis');
    }
}
