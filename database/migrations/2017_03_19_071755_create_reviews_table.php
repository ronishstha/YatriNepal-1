<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->string('status');
            $table->integer('meals');
            $table->integer('accommodation');
            $table->integer('transportation');
            $table->integer('pre_info');
            $table->integer('staffs');
            $table->integer('money_value');
            $table->string('slug');
            $table->string('user_id');
            $table->integer('itinerary_id')->unsigned();
            $table->foreign('itinerary_id')->references('id')->on('itineraries')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
