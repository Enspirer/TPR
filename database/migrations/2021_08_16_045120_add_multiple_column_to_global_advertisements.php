<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColumnToGlobalAdvertisements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('global_advertisements', function (Blueprint $table) {
            $table->text('large_right_image')->nullable()->after('name');
            $table->text('large_right_link')->nullable()->after('name');            
            $table->text('small_left_image')->nullable()->after('name');
            $table->text('small_left_link')->nullable()->after('name');            
            $table->text('small_middle_image')->nullable()->after('name');
            $table->text('small_middle_link')->nullable()->after('name');            
            $table->text('small_right_image')->nullable()->after('name');
            $table->text('small_right_link')->nullable()->after('name');
            
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
            $table->dropColumn('large_right_image');
            $table->dropColumn('large_right_link');
            $table->dropColumn('small_left_image');
            $table->dropColumn('small_left_link');
            $table->dropColumn('small_middle_image');
            $table->dropColumn('small_middle_link');
            $table->dropColumn('small_right_image');
            $table->dropColumn('small_right_link');
        });
    }
}
