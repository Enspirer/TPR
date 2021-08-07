<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFormColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('display_name')->nullable();
            $table->text('user_type')->nullable();
            $table->text('dob')->nullable();
            $table->text('gender')->nullable();
            $table->text('marital_status')->nullable();
            $table->text('city')->nullable();
            $table->text('province')->nullable();
            $table->text('country')->nullable();
            $table->text('postal_code')->nullable();
            $table->text('home_phone')->nullable();
            $table->text('mobile_phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
