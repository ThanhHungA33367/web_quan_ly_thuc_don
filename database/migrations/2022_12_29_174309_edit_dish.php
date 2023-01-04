<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditDish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dishes', function (Blueprint $table) {
            $table->integer('kalo')->default(0)->change();
            $table->integer('protein')->default(0)->change();
            $table->integer('lipid')->default(0)->change();
            $table->integer('carb')->default(0)->change();
            $table->integer('cost')->default(0)->change();
            $table->dropForeign(['meal_id']);
            $table->dropColumn('meal_id');
            $table->bigInteger('children_type_id')->unsigned()->nullable();
            $table->foreign('children_type_id')->references('id')->on('children_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dishes', function (Blueprint $table) {
            //
        });
    }
}
