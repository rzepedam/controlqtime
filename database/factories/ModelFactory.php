<?php

use Carbon\Carbon;
use Controlqtime\Core\Entities\Area;
use Controlqtime\Core\Entities\City;
use Controlqtime\Core\Entities\Fuel;
use Controlqtime\Core\Entities\User;
use Controlqtime\Core\Entities\Route;
use Controlqtime\Core\Entities\Region;
use Controlqtime\Core\Entities\Address;
use Controlqtime\Core\Entities\Commune;
use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Entities\Country;
use Controlqtime\Core\Entities\DayTrip;
use Controlqtime\Core\Entities\NumHour;
use Controlqtime\Core\Entities\Pension;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Entities\Forecast;
use Controlqtime\Core\Entities\Position;
use Controlqtime\Core\Entities\Province;
use Controlqtime\Core\Entities\Terminal;
use Controlqtime\Core\Entities\Mutuality;
use Controlqtime\Core\Entities\Trademark;
use Controlqtime\Core\Entities\LaborUnion;
use Controlqtime\Core\Entities\Profession;
use Controlqtime\Core\Entities\EngineCubic;
use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Entities\Periodicity;
use Controlqtime\Core\Entities\ModelVehicle;
use Controlqtime\Core\Entities\PieceVehicle;
use Controlqtime\Core\Entities\Relationship;
use Controlqtime\Core\Entities\TypeContract;
use Controlqtime\Core\Entities\Gratification;
use Controlqtime\Core\Entities\MaritalStatus;
use Controlqtime\Core\Entities\TypeInstitution;
use Controlqtime\Core\Entities\StatePieceVehicle;
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

$factory->define(Area::class, function ()
{
	return [
		'id'          => 1,
		'name'        => 'Mantención',
		'terminal_id' => 1
	];
});

$factory->define(City::class, function ()
{
	return [
		'id'         => 1,
		'name'       => 'Santiago',
		'country_id' => 1
	];
});

$factory->define(Commune::class, function ()
{
	return [
		'id'          => 1,
		'province_id' => 1,
		'name'        => 'La Florida'
	];
});

$factory->define(Country::class, function ()
{
	return [
		'id'   => 1,
		'name' => 'Chile',
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

$factory->define(DayTrip::class, function ()
{
	return [
		'id'   => 1,
		'name' => 'Full-Time',
	];
});

$factory->define(Employee::class, function (Faker\Generator $faker)
{
	$maleSurname   = $faker->lastName;
	$femaleSurname = $faker->lastName;
	$firstName     = $faker->firstName;
	$secondName    = $faker->firstName;
	
	return [
		'id'                => 1,
		'nationality_id'    => rand(1, 9),
		'gender_id'         => rand(1, 2),
		'marital_status_id' => rand(1, 4),
		'forecast_id'       => rand(1, 14),
		'pension_id'        => rand(1, 6),
		'male_surname'      => $maleSurname,
		'female_surname'    => $femaleSurname,
		'first_name'        => $firstName,
		'second_name'       => $secondName,
		'full_name'         => "$firstName $secondName $maleSurname $femaleSurname",
		'rut'               => rand(3, 24) . rand(100, 999) . rand(100, 999) . "-" . rand(1, 9),
		'birthday'          => $faker->date($format = 'd-m-Y', $max = 'now'),
		'email_employee'    => $faker->unique()->email,
		'url'               => 'https://s3-sa-east-1.amazonaws.com/biometry/faces/2016/07/18/200031564881.jpg',
		'state'             => 'disable'
	];
});

$factory->define(EngineCubic::class, function ()
{
	return [
		'id'         => 1,
		'name'       => 'Tonelada',
		'acr'        => 'ton',
		'deleted_at' => null
	];
});

$factory->define(Forecast::class, function ()
{
	return [
		'id'         => 1,
		'name'       => 'Cruz Blanca',
		'deleted_at' => null
	];
});

$factory->define(Fuel::class, function ()
{
	return [
		'id'         => 1,
		'name'       => '93',
		'deleted_at' => null
	];
});

$factory->define(Gratification::class, function ()
{
	return [
		'id'         => 1,
		'name'       => '25% legal anticipada con tope de 4.75 SMM',
		'deleted_at' => null
	];
});

$factory->define(Institution::class, function (Faker\Generator $faker)
{
	return [
		'id'                  => 1,
		'name'                => $faker->word,
		'type_institution_id' => 1,
		'deleted_at'          => null
	];
});

$factory->define(LaborUnion::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => $faker->word,
		'deleted_at' => null
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

$factory->define(MaritalStatus::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => $faker->word,
		'deleted_at' => null
	];
});

$factory->define(MasterFormPieceVehicle::class, function ()
{
	return [
		'id'   => 1,
		'name' => 'Maestro Formulario Chequeo Vehículos'
	];
});

$factory->define(ModelVehicle::class, function (Faker\Generator $faker)
{
	return [
		'id'           => 1,
		'name'         => $faker->word,
		'trademark_id' => 1,
		'deleted_at'   => null
	];
});

$factory->define(Mutuality::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => $faker->word,
		'deleted_at' => null
	];
});

$factory->define(NumHour::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => $faker->numberBetween(1, 999),
		'deleted_at' => null
	];
});

$factory->define(Pension::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => $faker->word,
		'deleted_at' => null
	];
});

$factory->define(Periodicity::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => $faker->word,
		'deleted_at' => null
	];
});

$factory->define(PieceVehicle::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => $faker->word,
		'deleted_at' => null
	];
});

$factory->define(Position::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => $faker->word,
		'deleted_at' => null
	];
});

$factory->define(Profession::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => $faker->word,
		'deleted_at' => null
	];
});

$factory->define(Province::class, function ()
{
	return [
		'id'        => 1,
		'region_id' => 1,
		'name'      => 'Santiago'
	];
});

$factory->define(Region::class, function ()
{
	return [
		'id'   => 1,
		'name' => 'Región Metropolitana de Santiago'
	];
});

$factory->define(Relationship::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => $faker->word,
		'deleted_at' => null
	];
});

$factory->define(Route::class, function (Faker\Generator $faker)
{
	return [
		'id'          => 1,
		'name'        => 'F05',
		'terminal_id' => 1,
		'deleted_at'  => null
	];
});

$factory->define(StatePieceVehicle::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => $faker->word,
		'deleted_at' => null
	];
});

$factory->define(TermAndObligatory::class, function (Faker\Generator $faker)
{
	return [
		'id'      => 1,
		'name'    => $faker->sentence,
		'default' => $faker->boolean
	];
});

$factory->define(Terminal::class, function ()
{
	return [
		'id'         => 1,
		'name'       => 'Juanita',
		'address'    => 'Av. Juanita 1490',
		'commune_id' => 1,
		'deleted_at' => null,
		'created_at' => Carbon::now()
	];
});

$factory->define(Trademark::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => $faker->word,
		'deleted_at' => null
	];
});

$factory->define(TypeContract::class, function (Faker\Generator $faker)
{
	return [
		'name' => $faker->word,
		'dur'  => $faker->numberBetween(1, 12)
	];
});

$factory->define(TypeInstitution::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => $faker->word,
		'deleted_at' => null
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