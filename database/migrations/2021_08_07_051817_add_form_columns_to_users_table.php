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
            $table->text('dob');
            $table->text('gender');
            $table->text('marital_status');
            $table->text('city')->nullable();
            $table->text('province')->nullable();
            $table->text('country');
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
