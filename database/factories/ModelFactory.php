<?php

use Controlqtime\Core\Entities\User;
use Controlqtime\Core\Entities\Address;
use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Entities\NumHour;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Entities\TypeContract;
use Controlqtime\Core\Entities\TermAndObligatory;
use Controlqtime\Core\Entities\LegalRepresentative;
use Controlqtime\Core\Api\Entities\AccessControlApi;
use Controlqtime\Core\Entities\MasterFormPieceVehicle;

$factory->define(AccessControlApi::class, function (Faker\Generator $faker)
{
	return [
		'employee_id' => 1,
		'rut'         => '17032680-6',
		'num_device'  => $faker->macAddress,
		'status'      => $faker->boolean
	];
});

$factory->define(Address::class, function (Faker\Generator $faker)
{
	return [
		'addressable_id'   => factory(Employee::class)->create()->id,
		'addressable_type' => 'Controlqtime\Core\Entities\Employee',
		'address'          => $faker->address,
		'commune_id'       => rand(1, 53),
	];
});

$factory->define(Company::class, function (Faker\Generator $faker)
{
	return [
		'type_company_id' => rand(1, 3),
		'rut'             => rand(100, 110) . rand(100, 999) . rand(100, 999) . "-" . rand(1, 9),
		'firm_name'       => $faker->company . " " . $faker->companySuffix,
		'gyre'            => $faker->sentence,
		'start_act'       => $faker->date($format = 'd-m-Y', $max = 'now'),
		'muni_license'    => strtoupper($faker->word),
		'email_company'   => $faker->email,
	];
	
});

$factory->define(Employee::class, function (Faker\Generator $faker)
{
	$maleSurname   = $faker->lastName;
	$femaleSurname = $faker->lastName;
	$firstName     = $faker->firstName;
	$secondName    = $faker->firstName;
	
	return [
		'user_id'           => factory(User::class)->create()->id,
		'male_surname'      => $maleSurname,
		'female_surname'    => $femaleSurname,
		'first_name'        => $firstName,
		'second_name'       => $secondName,
		'full_name'         => "$firstName $secondName $maleSurname $femaleSurname",
		'rut'               => rand(3, 24) . rand(100, 999) . rand(100, 999) . "-" . rand(1, 9),
		'birthday'          => $faker->date($format = 'd-m-Y', $max = 'now'),
		'nationality_id'    => rand(1, 9),
		'gender_id'         => rand(1, 2),
		'marital_status_id' => rand(1, 4),
		'forecast_id'       => rand(1, 14),
		'pension_id'        => rand(1, 6),
		'email_employee'    => $faker->unique()->email,
		'state'             => 'disable'
	];
});

$factory->define(LegalRepresentative::class, function (Faker\Generator $faker)
{
	return [
		'company_id'           => factory(Company::class)->create()->id,
		'male_surname'         => $faker->lastName,
		'female_surname'       => $faker->lastName,
		'first_name'           => $faker->firstName,
		'second_name'          => $faker->firstName,
		'rut_representative'   => rand(3, 24) . rand(100, 999) . rand(100, 999) . "-" . rand(1, 9),
		'birthday'             => $faker->date($format = 'd-m-Y', $max = 'now'),
		'nationality_id'       => rand(1, 9),
		'email_representative' => $faker->email,
	];
});

$factory->define(MasterFormPieceVehicle::class, function ()
{
	return [
		'id'   => 1,
		'name' => 'Maestro Formulario Chequeo Vehículos'
	];
});

$factory->define(TermAndObligatory::class, function (Faker\Generator $faker)
{
	return [
		'name'    => $faker->sentence,
		'default' => $faker->boolean
	];
});

$factory->define(TypeContract::class, function (Faker\Generator $faker)
{
	return [
		'name' => $faker->word,
		'dur'  => $faker->numberBetween(1, 12)
	];
});

$factory->define(User::class, function (Faker\Generator $faker)
{
	return [
		'employee_id' => 1,
		'email'       => $faker->email,
		'password'    => bcrypt("$faker->password")
	];
});

$factory->define(NumHour::class, function (Faker\Generator $faker)
{
	return [
		'name' => '60'
	];
});