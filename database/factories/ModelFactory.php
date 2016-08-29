<?php

use Controlqtime\Core\Api\Entities\AccessControl;
use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Entities\LegalRepresentative;

$factory->define(Company::class, function (Faker\Generator $faker)
{
	return [
		'type_company_id' => rand(1, 2),
		'rut'             => rand(100, 110) . rand(100, 999) . rand(100, 999) . "-" . rand(1, 9),
		'firm_name'       => $faker->company . " " . $faker->companySuffix,
		'gyre'            => $faker->sentence,
		'start_act'       => $faker->date($format = 'd-m-Y', $max = 'now'),
		'address'         => $faker->address,
		'commune_id'      => rand(1, 53),
		'lot'             => rand(1, 99),
		'ofi'             => rand(1, 50),
		'floor'           => rand(1, 30),
		'muni_license'    => strtoupper($faker->word),
		'phone1'          => $faker->phoneNumber,
		'phone2'          => $faker->phoneNumber,
		'email_company'   => $faker->email,
	];

});

$factory->define(LegalRepresentative::class, function (Faker\Generator $faker)
{
	return [
		'company_id'             => factory(Company::class)->create()->id,
		'male_surname'           => $faker->lastName,
		'female_surname'         => $faker->lastName,
		'first_name'             => $faker->firstName,
		'second_name'            => $faker->firstName,
		'rut_representative'     => rand(3, 24) . rand(100, 999) . rand(100, 999) . "-" . rand(1, 9),
		'birthday'               => $faker->date($format = 'd-m-Y', $max = 'now'),
		'nationality_id'         => rand(1, 9),
		'phone1_representative'  => $faker->phoneNumber,
		'phone2_representative'  => $faker->phoneNumber,
		'email_representative'   => $faker->email,
	];

});

$factory->define(Employee::class, function (Faker\Generator $faker)
{
	$maleSurname   = $faker->lastName;
	$femaleSurname = $faker->lastName;
	$firstName     = $faker->firstName;
	$secondName    = $faker->firstName;

	return [
		'male_surname'   	=> $maleSurname,
		'female_surname' 	=> $femaleSurname,
		'first_name'     	=> $firstName,
		'second_name'    	=> $secondName,
		'full_name'      	=> "$firstName $secondName $maleSurname $femaleSurname",
		'rut'            	=> rand(3, 24) . rand(100, 999) . rand(100, 999) . "-" . rand(1, 9),
		'birthday'       	=> $faker->date($format = 'd-m-Y', $max = 'now'),
		'nationality_id' 	=> rand(1, 9),
		'gender_id'      	=> rand(1, 2),
		'marital_status_id'	=> rand(1,4),
		'address'        	=> $faker->address,
		'commune_id'     	=> rand(1, 53),
		'email_employee' 	=> $faker->unique()->email,
		'phone1'         	=> $faker->phoneNumber,
		'phone2'         	=> $faker->phoneNumber,
		'state'			 	=> 'enable'
	];
});

$factory->define(AccessControl::class, function (Faker\Generator $faker)
{
	return array(
		'uuid'			=> $faker->uuid,
		'rut'			=> rand(3, 24) . rand(100, 999) . rand(100, 999) . "-" . rand(1, 9),
		'num_device'	=> $faker->macAddress,
		'status'		=> $faker->boolean
	);
});