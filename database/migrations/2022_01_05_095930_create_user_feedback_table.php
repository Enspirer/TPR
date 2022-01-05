<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_feedback', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('topic')->nullable();
            $table->text('stars')->nullable();
            $table->text('comment_question')->nullable();
            $table->text('buyer_seller')->nullable();
            $table->text('stage_property')->nullable();
            $table->text('suggestion')->nullable();
            $table->text('issues')->nullable();
            $table->text('provided_details')->nullable();
            $table->text('status')->nullable();
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
        Schema::dropIfExists('user_feedback');
    }
}
