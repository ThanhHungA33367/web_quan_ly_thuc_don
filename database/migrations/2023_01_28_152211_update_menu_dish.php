<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMenuDish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('menu_dish', function (Blueprint $table) {
        //     $table->unsignedBigInteger('kalo')->nullable();
        //     $table->foreign('meal_id')->references('id')->on('meals');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu_dish', function (Blueprint $table) {
            //
        });
    }
}
