<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAgentRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agent_requests', function (Blueprint $table) {
            $table->text('nic_photo')->nullable();
            $table->text('passport_photo')->nullable();
            $table->text('license_photo')->nullable();
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
            $table->dropColumn('nic_photo');
            $table->dropColumn('passport_photo');
            $table->dropColumn('license_photo');
        });
    }
}
