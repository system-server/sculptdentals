<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name_one');
            $table->string('last_name_two');
            $table->mediumtext('full_name')->nullable();
            $table->mediumtext('speciality')->nullable();
            $table->mediumtext('professional_card')->nullable();
            $table->mediumtext('university')->nullable();//procedencia
            $table->enum('sex',['MASCULINO','FEMENINO'])->default('MASCULINO');
            $table->string('cell_phone')->nullable();
            $table->string('home_phone')->nullable();
            $table->mediumtext('img_name')->nullable();
            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
