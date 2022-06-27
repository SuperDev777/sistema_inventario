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
            $table->unsignedBigInteger('campus_id');
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
            $table->text('observacion')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('campus_id')->references('id')->on('campus');
            $table->foreign('user_id')->references('id')->on('users');
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
