<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('menus', function (Blueprint $table) {
        //     $table->integer('kalo')->nullable()->change();
        //     $table->integer('protein')->nullable()->change();
        //     $table->integer('lipid')->nullable()->change();
        //     $table->integer('carb')->nullable()->change();
        //     $table->integer('cost')->nullable()->change();
        // });
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
