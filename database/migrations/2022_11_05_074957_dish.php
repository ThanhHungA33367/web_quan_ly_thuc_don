<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dish_type_id')->nullable();
            $table->foreign('dish_type_id')->references('id')->on('dish_type');
            $table->unsignedBigInteger('meal_id')->nullable();
            $table->foreign('meal_id')->references('id')->on('meals');
            $table->string('name');
            $table->string('description');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
