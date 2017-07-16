<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');

            //creacion de claves foraneas
            $table->integer('persona_id')->unsigned();
            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');

            $table->integer('habitacion_id')->unsigned();
            $table->foreign('habitacion_id')->references('id')->on('habitaciones')->onDelete('cascade');

            $table->date('fecha_inicio');
            $table->date('fecha_fin');

            $table->timestamps();

            //se usa para eliminacion logica
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
        Schema::dropIfExists('reservas');
    }
}
