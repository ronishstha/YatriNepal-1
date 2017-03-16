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
            $table->string('title');
            $table->string('trip_duration');
            $table->string('trekking_duration');
            $table->string('trekking_grade');
            $table->string('accommodation');
            $table->string('meals');
            $table->string('max_altitude');
            $table->string('best_time');
            $table->string('group_size');
            $table->string('start_end');
            $table->string('arrival');
            $table->string('departure');
            $table->string('date');
            $table->string('cost');
            $table->string('image');
            $table->string('route_map');
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('destination_id')->unsigned();
            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');
            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->integer('activity_id')->unsigned();
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->text('summary');
            $table->text('trip_introduction');
            $table->text('itinerary');
            $table->text('important_note');
            $table->text('cost_inclusive');
            $table->text('cost_exclusive');
            $table->text('trekking_group');
            $table->enum('trip_status', ['Booking Open', 'Join a Group', 'Limited Space', 'Sold Out'])->default('Booking Open');
            $table->string('slug');
            $table->string('user_id');
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
