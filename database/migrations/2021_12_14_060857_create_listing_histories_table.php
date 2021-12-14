<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_id')->nullable();
            $table->text('property_id')->nullable();
            $table->text('date_start')->nullable();
            $table->text('date_end')->nullable();
            $table->text('price')->nullable();
            $table->text('event')->nullable();
            $table->text('listing_id')->nullable();
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
        Schema::dropIfExists('listing_histories');
    }
}
