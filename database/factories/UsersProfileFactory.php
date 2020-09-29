<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\UserCompany;
use App\UsersProfile;
use Faker\Generator as Faker;

$factory->define(UsersProfile::class, function (Faker $faker) {
    return [
        'user_id' => User::pluck('id')->random(1)[0],
        'gender' => (($faker->numberBetween($min = 1, $max = 2) == 1) ? 'Male' : 'Female'),
        'place_of_birth' => 'Surabaya',
        'date_of_birth' => now(),
        'address' => 'Ketintang',
        'contact' => '123456789',
        'photo' => 'null',
        'bio' => 'Kowkaokawokoawkoawkoakw'
    ];
});
