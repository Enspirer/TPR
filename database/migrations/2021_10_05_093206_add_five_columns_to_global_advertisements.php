<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFiveColumnsToGlobalAdvertisements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('global_advertisements', function (Blueprint $table) {
            $table->text('small_right_description')->nullable()->after('small_right_link');
            $table->text('small_middle_description')->nullable()->after('small_middle_link');
            $table->text('small_left_description')->nullable()->after('small_left_link');
            $table->text('large_right_description')->nullable()->after('large_right_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('global_advertisements', function (Blueprint $table) {
            $table->dropColumn('small_right_description');
            $table->dropColumn('small_middle_description');
            $table->dropColumn('small_left_description');
            $table->dropColumn('large_right_description');
        });
    }
}
