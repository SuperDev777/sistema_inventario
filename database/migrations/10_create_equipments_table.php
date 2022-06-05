<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string('campus_id');
            $table->unsignedBigInteger('areas_id');
            $table->string('piso');
            $table->string('codigo',20)->unique;
            $table->string('tipo');
            $table->string('marca');
            $table->string('modelo');
            $table->string('numserie');
            $table->string('mac')->unique;
            $table->string('procesador');
            $table->string('ram');
            $table->string('tipodisco');
            $table->string('capacidaddisco');
            $table->string('sistemaoperativo');
            $table->string('adquisicion');
            $table->integer('stock');
            $table->text('observacion')->nullable();
            $table->unsignedBigInteger('users_id');
            $table->foreign('campus_id')->references('id')->on('campus');
            $table->foreign('areas_id')->references('id')->on('areas');
            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('equipos');
    }
};
