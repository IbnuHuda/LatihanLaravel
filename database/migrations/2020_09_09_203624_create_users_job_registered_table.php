<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersJobRegisteredTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_job_registered', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('team_id')->unsigned()->nullable();
            $table->bigInteger('company_job_id')->unsigned()->nullable();
            $table->string('users_description')->nullable();
            $table->string('portofolio_uploaded')->nullable();
            $table->string('score')->nullable();
            $table->string('other_question')->nullable();
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
        Schema::dropIfExists('users_job_registered');
    }
}
