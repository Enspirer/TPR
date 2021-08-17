<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('country');
            $table->text('company_name')->nullable();
            $table->text('company_registration_number')->nullable();
            $table->text('address');
            $table->text('telephone');
            $table->text('email');
            $table->text('description_message');
            $table->text('request')->nullable();
            $table->text('photo')->nullable();
            $table->text('nic')->nullable();
            $table->text('passport')->nullable();
            $table->text('license')->nullable();
            $table->text('tax_number')->nullable();
            $table->text('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_requests');
    }
}
