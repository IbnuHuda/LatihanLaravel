<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserCompany;
use App\CompanyProfile;
use Faker\Generator as Faker;

$factory->define(CompanyProfile::class, function (Faker $faker) {
    return [
        'user_company_id' => UserCompany::pluck('id')->random(1)[0],
        'name' => 'Perusahaan Design',
        'work_field' => 'Freelancer',
        'date_of_built' => now(),
        'company_logo' => '',
        'company_address' => 'Ketintang',
        'contact_number' => '0123456789',
        'contact_email' => 'a@a.com',
        'company_description' => 'abcdefg',
    ];
});
