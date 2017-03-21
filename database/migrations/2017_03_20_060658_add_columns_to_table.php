<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->integer('meals');
            $table->integer('accommodation');
            $table->integer('transportation');
            $table->integer('pre_info');
            $table->integer('staffs');
            $table->integer('money_value');
            $table->integer('overall');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('meals');
            $table->dropColumn('accommodation');
            $table->dropColumn('transportation');
            $table->dropColumn('pre_info');
            $table->dropColumn('staffs');
            $table->dropColumn('money_value');
        });
    }
}
