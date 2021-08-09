<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_boxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('property_id');
            $table->text('property_image');
            $table->text('user_id');
            $table->text('agent_id');
            $table->text('message')->nullable();
            $table->text('status')->comment('read,unread');
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
        Schema::dropIfExists('booking_boxes');
    }
}
