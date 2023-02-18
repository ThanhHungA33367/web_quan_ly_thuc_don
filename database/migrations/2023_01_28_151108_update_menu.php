<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->unsignedBigInteger('children_type_id')->nullable();
            $table->foreign('children_type_id')->references('id')->on('children_type');
            $table->date('menu_date');
            $table->integer('kalo');
            $table->integer('protein');
            $table->integer('lipid');
            $table->integer('carb');
            $table->integer('cost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menus', function (Blueprint $table) {
            //
        });
    }
}
