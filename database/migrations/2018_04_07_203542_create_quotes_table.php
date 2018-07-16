<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hour');
            $table->date('date');
            $table->mediumtext('treatment')->nullable();
            $table->text('observation')->nullable();
            $table->enum('status',['DISPONIBLE','REAGENDO','NO ASISTIO','EN ESPERA','ATENDIDO'])->default('DISPONIBLE');
            $table->unsignedInteger('doctor_id');
            $table->unsignedInteger('customer_id');
            $table->timestamps();
            //Relaciones
            $table->foreign('doctor_id')->references('id')->on('doctors')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes');
    }
}
