<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSevenColumnsToProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->text('address_one')->nullable()->after('property_history');
            $table->text('address_two')->nullable()->after('property_history');
            $table->text('states')->nullable()->after('property_history');
            $table->text('postal_code')->nullable()->after('property_history');
            $table->text('virtual_tour_access_user')->nullable()->after('property_history');
            $table->text('virtual_tour_access')->nullable()->after('property_history');
            $table->text('virtual_tour')->nullable()->after('property_history');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('address_one');
            $table->dropColumn('address_two');
            $table->dropColumn('states');
            $table->dropColumn('postal_code');
            $table->dropColumn('virtual_tour_access_user');
            $table->dropColumn('virtual_tour_access');
            $table->dropColumn('virtual_tour');
        });
    }
}
