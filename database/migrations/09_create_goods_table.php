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
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',20)->unique;
            $table->string('tipo');
            $table->string('marca',70);
            $table->string('descripcion',100);
            $table->integer('stock');
            $table->timestamps();
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
};
