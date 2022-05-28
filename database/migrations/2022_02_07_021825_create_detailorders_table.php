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
        Schema::create('detailorders', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->string('unidadmedida');
            $table->string('descripcion',100);
            $table->timestamps();
            $table->unsignedBigInteger('orders_id');
            $table->foreign('orders_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallepedidos');
    }
};
