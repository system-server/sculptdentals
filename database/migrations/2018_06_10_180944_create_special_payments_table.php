<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('amount');
            $table->mediumText('description');
            $table->integer('special_concept_id')->unsigned();
            $table->timestamps();
            //relation
            $table->foreign('special_concept_id')->references('id')->on('special_concepts')
                ->onDelete('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('special_payments');
    }
}
