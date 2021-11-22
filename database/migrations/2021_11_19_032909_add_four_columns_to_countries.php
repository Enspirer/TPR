<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFourColumnsToCountries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->text('statistic_api_key')->nullable()->after('address');
            $table->text('statistic_api_cliend_id')->nullable()->after('address');
            $table->text('json_url')->nullable()->after('address');
            $table->text('api_provider_name')->nullable()->after('address');
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
            $table->dropColumn('statistic_api_key');
            $table->dropColumn('statistic_api_cliend_id');
            $table->dropColumn('json_url');
            $table->dropColumn('api_provider_name');
        });
    }
}
