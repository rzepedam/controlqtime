<?php

use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Entities\LegalRepresentative;
use Controlqtime\Core\Entities\Subsidiary;

$factory->define(Company::class, function (Faker\Generator $faker) {
    
    return [
        'rut'           => rand(100, 110) . "." . rand(100, 999) . "." . rand(100, 999) . "-" . rand(1,9),
        'firm_name'     => $faker->company . " " . $faker->companySuffix,
        'gyre'          => $faker->sentence,
        'start_act'     => $faker->date($format = 'd-m-Y', $max = 'now'),
        'address'       => $faker->address,
        'commune_id'    => 102,
        'num'           => rand(100, 999),
        'lot'           => rand(1, 99),
        'ofi'           => rand(1, 50),
        'floor'         => rand(1,30),
        'muni_license'  => strtoupper($faker->word),
        'phone1'        => $faker->phoneNumber,
        'phone2'        => $faker->phoneNumber,
        'email'         => $faker->email,
    ];

});

$factory->define(LegalRepresentative::class, function (Faker\Generator $faker) {
    
    return [
        'company_id'        => rand(1, 25),
        'male_surname'      => $faker->lastName,
        'female_surname'    => $faker->lastName,
        'first_name'        => $faker->firstName,
        'second_name'       => $faker->firstName,
        'rut_legal'         => rand(3, 24) . "." . rand(100, 999) . "." . rand(100, 999) . "-" . rand(1,9),
        'birthday'          => $faker->date($format = 'd-m-Y', $max = 'now'),
        'nationality_id'    => rand(1, 9),
        'phone1_legal'      => $faker->phoneNumber,
        'phone2_legal'      => $faker->phoneNumber,
        'email_legal'       => $faker->email,
    ];

});

$factory->define(Subsidiary::class, function (Faker\Generator $faker) {
    
    return [
        'company_id'        => rand(1, 25),
        'address_suc'       => $faker->address,
        'commune_suc_id'    => rand(1, 53),
        'num_suc'           => rand(100, 999),
        'lot_suc'           => rand(1, 99),
        'ofi_suc'           => rand(1, 50),
        'floor_suc'         => rand(1,30),
        'muni_license_suc'  => strtoupper($faker->word),
        'phone1_suc'        => $faker->phoneNumber,
        'phone2_suc'        => $faker->phoneNumber,
        'email_suc'         => $faker->email,
    ];
    
});

$factory->define(Controlqtime\Manpower::class, function (Faker\Generator $faker) {

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
        'rut'               => rand(3, 24) . "." . rand(100, 999) . "." . rand(100, 999) . "-" . rand(1,9),
        'birthday'          => $faker->date($format = 'd-m-Y', $max = 'now'),
        'nationality_id'    => rand(1, 9),
        'gender_id'         => rand(1, 2),
        'address'           => $faker->address,
        'commune_id'        => rand(1, 53),
        'email'             => $faker->unique()->email,
        'phone1'            => $faker->phoneNumber,
        'phone2'            => $faker->phoneNumber,
        'forecast_id'       => rand(1, 4),
        'mutuality_id'      => rand(1, 4),
        'pension_id'        => rand(1, 6),
        'role_id'           => rand(1, 4),
        'company_id'        => rand(1, 25),
        'area_id'           => rand(1, 3),
    ];
});