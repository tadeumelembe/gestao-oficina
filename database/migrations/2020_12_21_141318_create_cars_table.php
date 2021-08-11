<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->string('marca');
            $table->string('combustivel');
            $table->integer('anoFabrico');
            $table->string('matricula')->unique();
            $table->string('tipo');
            $table->string('photo')->nullable();
            $table->string('status')->default('Activo');

            $table->string('proprietario_nome')->nullable();
            $table->string('proprietario_telefone')->nullable();
            $table->string('proprietario_bi')->nullable();
            $table->string('proprietario_email')->nullable();
            $table->string('proprietario_sexo')->nullable();

            $table->unsignedBigInteger('customer_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
