<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('nationality');
            $table->string('state');
            $table->string('email');
            $table->string('mobile');
            $table->string('landline')->nullable();
            $table->string('date_of_birth');
            $table->string('occupation');
            $table->string('mailing_address')->nullable();
            $table->string('passport_no');
            $table->string('place_of_issue');
            $table->string('issue_date');
            $table->string('expiration_date');
            $table->string('emergency_contact')->nullable();
            $table->integer('booking_id')->unsigned();
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->integer('itinerary_id')->unsigned();
            $table->foreign('itinerary_id')->references('id')->on('itineraries')->onDelete('cascade');
            $table->enum('status', ['published', 'unpublished', 'trash'])->default('published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookdetails');
    }
}
