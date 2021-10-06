<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThreeColumnsToCountries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->text('address')->nullable()->after('currency_rate');
            $table->text('opening_hours')->nullable()->after('currency_rate');
            $table->text('phone_numbers')->nullable()->after('currency_rate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('opening_hours');
            $table->dropColumn('phone_numbers');
        });
    }
}
