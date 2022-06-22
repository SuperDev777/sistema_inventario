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
        Schema::create('detailreceives', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->string('unidadmedida');
            $table->string('descripcion',100);
            $table->timestamps();
            $table->unsignedBigInteger('received_id');
            $table->foreign('received_id')->references('id')->on('receives');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallerecibidos');
    }
};
