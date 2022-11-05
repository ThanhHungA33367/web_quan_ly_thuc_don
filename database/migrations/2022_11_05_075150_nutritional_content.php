<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NutritionalContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutritional_content', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ingredient_id')->nullable();
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
            $table->integer('calo');
            $table->float('protein');
            $table->float('lipid');
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
