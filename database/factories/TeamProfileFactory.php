<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\TeamProfile;
use Faker\Generator as Faker;

$factory->define(TeamProfile::class, function (Faker $faker) {
    return [
        'name' => 'Team',
        'owner' => $faker->name,
        'access_code' => 'a',
        'address' => 'a',
        'photo' => 'a',
        'bio' => 'a',
    ];
});
