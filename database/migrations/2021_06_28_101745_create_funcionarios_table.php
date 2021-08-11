<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
	        $table->string('name');
            $table->string('surname');
            $table->string('phoneNumber');
            $table->string('email')->nullable();

            // $table->string('country')->nullable();
            // $table->string('city')->nullable();
            // $table->string('street')->nullable();

            $table->string('status')->default('Active');
            $table->timestamps();
	    $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
