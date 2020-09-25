<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationUsersJobRegisteredTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_job_registered', function ($table) {
            $table->foreign('team_id')->references('id')->on('users_team_profile');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('company_job_id')->references('id')->on('company_jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
