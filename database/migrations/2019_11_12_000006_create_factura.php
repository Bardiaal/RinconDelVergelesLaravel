<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('horaInicio');
            $table->string('horaCierre');
            $table->float('total');
            $table->bigInteger('mesa')->unsigned();
            $table->foreign('mesa')->references('id')->on('mesa');
            $table->bigInteger('idEmpleadoInicio')->unsigned();
            $table->foreign('idEmpleadoInicio')->references('id')->on('empleado');
            $table->bigInteger('idEmpleadoFinal')->unsigned();
            $table->foreign('idEmpleadoFinal')->references('id')->on('empleado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura');
    }
}
