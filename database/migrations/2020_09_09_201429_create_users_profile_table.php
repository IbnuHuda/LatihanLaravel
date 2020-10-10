<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_profile', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('user_company_id')->unsigned()->nullable();
            $table->string('gender')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('photo')->nullable();
            $table->string('bio')->nullable();
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
        Schema::dropIfExists('users_profile');
    }
}
