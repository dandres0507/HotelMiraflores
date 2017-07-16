<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadia', function (Blueprint $table) {
            $table->increments('id');

            //creacion de claves foraneas
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');

            $table->integer('habitacion_id')->unsigned();
            $table->foreign('habitacion_id')->references('id')->on('habitaciones')->onDelete('cascade');

            $table->integer('trabajador_id')->unsigned();
            $table->foreign('trabajador_id')->references('id')->on('trabajadores')->onDelete('cascade');
            
            $table->decimal('monto_total',10,2);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');

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
        Schema::dropIfExists('estadia');
    }
}
