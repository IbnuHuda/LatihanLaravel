<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_company', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_company_id')->unsigned();
            $table->string('name');
            $table->string('work_field');
            $table->string('date_of_built');
            $table->string('address');
            $table->string('company_logo');
            $table->string('contact_number');
            $table->string('contact_email');
            $table->string('bio');
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
        Schema::dropIfExists('profile_users_company');
    }
}
