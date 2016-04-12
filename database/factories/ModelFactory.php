<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use Carbon\Carbon;

$factory->define(App\Company::class, function (Faker\Generator $faker) {

    return [
        'rut'           => $faker->numberBetween($min = 10000000, $max = 20000000),
        'firm_name'     => $faker->company . " " . $faker->companySuffix,
        'gyre'          => $faker->sentence,
        'start_act'     => '08-03-1999',
        'address'       => $faker->address,
        'commune_id'    => 102,
        'num'           => '1379',
        'lot'           => '10',
        'ofi'           => '1',
        'floor'         => '2',
        'muni_license'  => 'KNJBHGFCGVHBCFGV2019-K',
        'email'         => $faker->email,
        'phone1'        => $faker->phoneNumber,
        'phone2'        => $faker->phoneNumber,
        'status'        => true
    ];

});


$factory->define(App\Manpower::class, function (Faker\Generator $faker) {

    $maleSurname   = $faker->lastName;
    $femaleSurname = $faker->lastName;
    $firstName     = $faker->firstName;
    $secondName    = $faker->firstName;

    return [
        'male_surname'      => $maleSurname,
        'female_surname'    => $femaleSurname,
        'first_name'        => $firstName,
        'second_name'       => $secondName,
        'full_name'         => "$firstName $secondName $maleSurname $femaleSurname",
        'rut'               => $faker->numberBetween($min = 10000000, $max = 20000000),
        'birthday'          => '09-10-2000',
        'nationality_id'    => rand(1,9),
        'gender_id'         => rand(1,2),
        'address'           => $faker->address,
        'commune_id'        => rand(1,53),
        'email'             => $faker->unique()->email,
        'phone1'            => $faker->phoneNumber,
        'phone2'            => $faker->phoneNumber,
        'forecast_id'       => rand(1,4),
        'mutuality_id'      => rand(1,4),
        'pension_id'        => rand(1,6),
        'rating_id'         => rand(1,4),
        'company_id'        => rand(1,2)
    ];
});