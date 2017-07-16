<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->increments('id');
            //creacion de claves foraneas
            $table->integer('tipo_habitacion_id')->unsigned();
            $table->foreign('tipo_habitacion_id')->references('id')->on('tipo_habitaciones')->onDelete('cascade');
            
            $table->string('nombre',45);
            $table->string('descripcion',45);
            $table->decimal('precio',10,2);

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
        Schema::dropIfExists('habitaciones');
    }
}
