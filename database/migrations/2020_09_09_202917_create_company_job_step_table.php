<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyJobStepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_job_step', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_job_id')->unsigned();
            $table->string('step_name');
            $table->string('user_id_accepted');
            $table->string('inweb_message_to_vendor');
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
        Schema::dropIfExists('company_job_step');
    }
}
