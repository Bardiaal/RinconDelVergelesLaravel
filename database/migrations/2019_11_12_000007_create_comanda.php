<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComanda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comanda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idFactura')->unsigned();
            $table->bigInteger('idProducto')->unsigned();
            $table->string('nombreProducto');
            $table->bigInteger('idEmpleado')->unsigned();
            $table->bigInteger('unidades');
            $table->bigInteger('entregada'); //0 = sin entregar o 1 = entregada
            $table->float('precio');
            $table->foreign('idFactura')->references('id')->on('factura')->on('factura')->onDelete('cascade');
            $table->foreign('idProducto')->references('id')->on('producto');
            $table->foreign('idEmpleado')->references('id')->on('empleado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comanda');
    }
}
