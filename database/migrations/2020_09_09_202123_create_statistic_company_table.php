<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistic_company', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_company_id')->unsigned();
            $table->string('job_published_amount');
            $table->string('users_accepted_amount');
            $table->string('users_active_on_jobs');
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
        Schema::dropIfExists('statistic_company');
    }
}
