<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserCompany;
use App\CompanyProfile;
use Faker\Generator as Faker;

$factory->define(CompanyProfile::class, function (Faker $faker) {
    return [
        'user_company_id' => UserCompany::pluck('id')->random(1)[0],
        'name' => 'Perusahaan A',
        'work_field' => 'Freelancer',
        'date_of_built' => now(),
        'company_address' => 'a',
        'company_logo' => 'a',
        'contact_number' => 'a',
        'contact_email' => 'a',
        'company_description' => 'a',
    ];
});
