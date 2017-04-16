<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItinerariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itineraries', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('itinerary_code');
            $table->string('title');
            $table->string('trip_duration');
            $table->string('trekking_duration');
            $table->enum('trekking_grade', ['easy', 'medium', 'hard'])->default('easy');
            $table->string('accommodation');
            $table->string('meals');
            $table->string('max_altitude')->nullable();
            $table->string('best_time');
            $table->string('group_size');
            $table->string('start_end');
            $table->string('arrival');
            $table->string('departure');
            $table->string('date')->nullable();
            $table->string('cost');
            $table->string('image')->nullable();
            $table->string('route_map')->nullable();
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('destination_id')->nullable();
            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->integer('activity_id')->unsigned();
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->integer('category_id')->nullable();
            $table->text('summary');
            $table->text('trip_introduction');
            $table->text('itinerary');
            $table->text('important_note')->nullable();
            $table->text('cost_inclusive');
            $table->text('cost_exclusive');
            $table->text('trekking_group')->nullable();
            $table->enum('trip_status', ['Booking Open', 'Join a Group', 'Limited Space', 'Sold Out'])->default('Booking Open');
            $table->string('slug');
            $table->string('user_id');
            $table->enum('featured', ['yes', 'no'])->default('no');
            $table->enum('special_package', ['yes', 'no'])->default('no');
            $table->enum('best_selling', ['yes', 'no'])->default('no');
            $table->enum('status', ['published', 'unpublished', 'trash'])->default('published');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itineraries');
    }
}
