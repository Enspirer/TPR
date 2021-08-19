<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_advertisements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name')->nullable();
            $table->text('category')->nullable();
            $table->text('link')->nullable();
            $table->text('country')->nullable();
            $table->text('admin_approval')->nullable();
            $table->text('country_manager_approval')->nullable();
            $table->text('image')->nullable();
            $table->text('status')->nullable();            
            $table->integer('order')->nullable();
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
        Schema::dropIfExists('home_page_advertisements');
    }
}
