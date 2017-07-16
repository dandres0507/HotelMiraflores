<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleserviciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleservicios', function (Blueprint $table) {
            $table->increments('id');

            //creacion de claves foraneas
            $table->integer('estadia_id')->unsigned();
            $table->foreign('estadia_id')->references('id')->on('estadia')->onDelete('cascade');

            $table->integer('servicio_id')->unsigned();
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
            $table->decimal('precio',10,2);
            
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalleservicios');
    }
}
