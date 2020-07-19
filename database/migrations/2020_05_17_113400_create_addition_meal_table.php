<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdditionMealTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addition_meal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('addition_id');
            $table->unsignedBigInteger('meal_id');
            $table->foreign('addition_id')->references('id')->on('additions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('meal_id')->references('id')->on('meals')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('addition_meal');
    }
}
