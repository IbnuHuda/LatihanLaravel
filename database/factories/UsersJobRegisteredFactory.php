<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\TeamProfile;
use App\CompanyJobs;
use App\UsersJobRegistered;
use Faker\Generator as Faker;

$factory->define(UsersJobRegistered::class, function (Faker $faker) {
    return [
        'user_id' => User::pluck('id')->random(1)[0],
        'company_job_id' => 1,
        'users_description' => 'akwoakowkoakwokaoowakoawk',
        'portofolio_uploaded' => 'gambar1.jpg|gambar2.jpg|gambar3.jpg',
        'other_question' => '1.Apakah?|2.Bagaimana?'
    ];
});
