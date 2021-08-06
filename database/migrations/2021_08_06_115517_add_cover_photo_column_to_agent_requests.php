<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoverPhotoColumnToAgentRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agent_requests', function (Blueprint $table) {
            $table->text('cover_photo')->nullable()->after('request');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agent_requests', function (Blueprint $table) {
            $table->dropColumn('cover_photo');
        });
    }
}
