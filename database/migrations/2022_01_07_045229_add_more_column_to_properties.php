<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnToProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->text('interior_image')->nullable()->after('address_one');
            $table->text('interior_image_access')->nullable()->after('address_one');
            $table->text('search_keyword')->nullable()->after('address_one');
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
            $table->dropColumn('interior_image');
            $table->dropColumn('interior_image_access');
            $table->dropColumn('search_keyword');
        });
    }
}
