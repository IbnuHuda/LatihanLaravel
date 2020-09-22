<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CompanyProfile;
use App\CompanyJobs;
use Faker\Generator as Faker;

$factory->define(CompanyJobs::class, function (Faker $faker) {
    return [
        'company_id' => CompanyProfile::pluck('id')->random(1)[0],
        'jobs_name' => 'Wkaokaokoaw 1',
        'available_positions' => 'Designer',
        'jobs_description' => 'KWokawokawokawokowa 1 butuh awkoawkowakoawkoawk 2',
        'jobs_requirements' => 'Good looking, Elek, Ra jelas',
        'minimum_portofolio' => 0,
        'vendor_accepted_total' => 1,
        'jobs_expired' => $faker->dateTimeBetween('+10 days', '+30 days'),
        'other' => 'awkoakwokawokwoak 1 gak mau kalau aokwoawkoawkowak 2 gini, jadi awkawokoawkoawko 1 jadiin awkaokwokoawkow 2 gini aja, lalu awokaowkoawkoawkoa 1 bikin aowkoakwoakwokawokwao jadi gitu, dan gak jelas.'
    ];
});
