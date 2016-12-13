<?php

use Carbon\Carbon;
use Controlqtime\Core\Entities\Area;
use Controlqtime\Core\Entities\City;
use Controlqtime\Core\Entities\Fuel;
use Controlqtime\Core\Entities\User;
use Controlqtime\Core\Entities\Route;
use Controlqtime\Core\Entities\Degree;
use Controlqtime\Core\Entities\Region;
use Controlqtime\Core\Entities\Weight;
use Controlqtime\Core\Entities\Address;
use Controlqtime\Core\Entities\Commune;
use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Entities\Country;
use Controlqtime\Core\Entities\DayTrip;
use Controlqtime\Core\Entities\NumHour;
use Controlqtime\Core\Entities\Pension;
use Controlqtime\Core\Entities\Vehicle;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Entities\Forecast;
use Controlqtime\Core\Entities\Position;
use Controlqtime\Core\Entities\Province;
use Controlqtime\Core\Entities\Terminal;
use Controlqtime\Core\Entities\TypeExam;
use Controlqtime\Core\Entities\DetailBus;
use Controlqtime\Core\Entities\Mutuality;
use Controlqtime\Core\Entities\Trademark;
use Controlqtime\Core\Entities\LaborUnion;
use Controlqtime\Core\Entities\Profession;
use Controlqtime\Core\Entities\EngineCubic;
use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Entities\Nationality;
use Controlqtime\Core\Entities\Periodicity;
use Controlqtime\Core\Entities\TypeCompany;
use Controlqtime\Core\Entities\TypeDisease;
use Controlqtime\Core\Entities\TypeVehicle;
use Controlqtime\Core\Entities\ModelVehicle;
use Controlqtime\Core\Entities\PieceVehicle;
use Controlqtime\Core\Entities\Relationship;
use Controlqtime\Core\Entities\StateVehicle;
use Controlqtime\Core\Entities\TypeContract;
use Controlqtime\Core\Entities\DetailVehicle;
use Controlqtime\Core\Entities\Gratification;
use Controlqtime\Core\Entities\MaritalStatus;
use Controlqtime\Core\Entities\TypeDisability;
use Controlqtime\Core\Entities\TypeSpeciality;
use Controlqtime\Core\Entities\TypeInstitution;
use Controlqtime\Core\Entities\StatePieceVehicle;
use Controlqtime\Core\Entities\TermAndObligatory;
use Controlqtime\Core\Entities\TypeCertification;
use Controlqtime\Core\Entities\LegalRepresentative;
use Controlqtime\Core\Api\Entities\AccessControlApi;
use Controlqtime\Core\Entities\DetailAddressCompany;
use Controlqtime\Core\Entities\MasterFormPieceVehicle;
use Controlqtime\Core\Entities\TypeProfessionalLicense;
use Controlqtime\Core\Entities\DateDocumentationVehicle;
use Controlqtime\Core\Entities\DetailAddressLegalEmployee;

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
		'addressable_id'   => 1,
		'addressable_type' => 'Controlqtime\Core\Entities\Employee',
		'address'          => $faker->address,
		'commune_id'       => 1,
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
		'province_id' => 1,
		'name'        => 'La Florida'
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

$factory->state(Company::class, 'enable', function ()
{
	return [
		'state' => 'enable'
	];
});

$factory->state(Company::class, 'disable', function ()
{
	return [
		'state' => 'disable'
	];
});

$factory->define(Country::class, function ()
{
	return [
		'id'   => 1,
		'name' => 'Chile',
	];
});

$factory->define(DateDocumentationVehicle::class, function ()
{
	return [
		'emission_padron'       => Carbon::parse('-1 year')->format('d-m-Y'),
		'expiration_padron'     => Carbon::parse('+1 year')->format('d-m-Y'),
		'emission_insurance'    => Carbon::parse('-10 weeks')->format('d-m-Y'),
		'expiration_insurance'  => Carbon::parse('+2 years')->format('d-m-Y'),
		'emission_permission'   => Carbon::parse('-3 years')->format('d-m-Y'),
		'expiration_permission' => Carbon::parse('+5 years')->format('d-m-Y')
	];
});

$factory->define(DayTrip::class, function ()
{
	return [
		'id'   => 1,
		'name' => 'Full-Time',
	];
});

$factory->define(Degree::class, function (Faker\Generator $faker)
{
	return [
		'id'   => 1,
		'name' => 'Título Profesional',
	];
});

$factory->define(DetailAddressCompany::class, function (Faker\Generator $faker)
{
	return [
		'lot'   => rand(1, 10) . $faker->randomLetter,
		'bod'   => rand(1, 99),
		'ofi'   => rand(1, 10),
		'floor' => rand(1, 10)
	];
});

$factory->define(DetailAddressLegalEmployee::class, function (Faker\Generator $faker)
{
	return [
		'depto'    => rand(1, 999),
		'block'    => rand(1, 99),
		'num_home' => rand(1, 99)
	];
});

$factory->define(DetailBus::class, function (Faker\Generator $faker)
{
	return [
		'carr'       => $faker->word,
		'num_plazas' => rand(50, 100),
	];
});

$factory->define(DetailVehicle::class, function (Faker\Generator $faker)
{
	return [
		'color'        => $faker->word,
		'num_chasis'   => rand(10000000000000, 99999999999999),
		'num_motor'    => rand(10000000000000, 99999999999999),
		'km'           => rand(1, 200000),
		'engine_cubic' => rand(1000, 3000),
		'weight'       => rand(1000, 5000),
		'tag'          => rand(10000000000000, 99999999999999),
		'obs'          => $faker->paragraph
	];
});

$factory->define(Employee::class, function (Faker\Generator $faker)
{
	$maleSurname   = $faker->lastName;
	$femaleSurname = $faker->lastName;
	$firstName     = $faker->firstName;
	$secondName    = $faker->firstName;
	
	return [
		'nationality_id'    => 1,
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
		'is_male'           => true,
		'email_employee'    => $faker->unique()->email,
		'url'               => 'https://s3-sa-east-1.amazonaws.com/biometry/faces/2016/07/18/200031564881.jpg',
		'state'             => 'disable',
		'created_at'        => Carbon::now()
	];
});

$factory->define(EngineCubic::class, function (Faker\Generator $faker)
{
	return [
		'name'       => $faker->words(10, true),
		'acr'        => $faker->randomLetter . $faker->randomLetter,
		'deleted_at' => null
	];
});

$factory->define(Forecast::class, function (Faker\Generator $faker)
{
	return [
		'name'       => $faker->word,
		'deleted_at' => null
	];
});

$factory->define(Fuel::class, function (Faker\Generator $faker)
{
	return [
		'name'       => rand(90, 99),
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
		'name'                => 'Universidad Católica de Chile',
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
		'name'         => $faker->words(8, true),
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

$factory->define(Nationality::class, function (Faker\Generator $faker)
{
	return [
		'name' => $faker->word,
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
		'region_id' => 1,
		'name'      => 'Santiago'
	];
});

$factory->define(Region::class, function ()
{
	return [
		'name' => 'Región Metropolitana de Santiago'
	];
});

$factory->define(Relationship::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => 'Padre',
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

$factory->define(StateVehicle::class, function (Faker\Generator $faker)
{
	return [
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
		'name'       => $faker->words(10, true),
		'deleted_at' => null
	];
});

$factory->define(TypeCertification::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => 'Certificación Java',
		'deleted_at' => null
	];
});

$factory->define(TypeCompany::class, function (Faker\Generator $faker)
{
	return [
		'name'       => $faker->word,
		'deleted_at' => null
	];
});

$factory->define(TypeContract::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => 'Plazo Fijo',
		'dur'        => $faker->numberBetween(1, 12),
		'full_name'  => '',
		'deleted_at' => null
	];
});

$factory->define(TypeDisability::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => 'Esclerosis Múltiple',
		'deleted_at' => null
	];
});

$factory->define(TypeDisease::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => 'El Síndrome de la Fatiga Crónica',
		'deleted_at' => null
	];
});

$factory->define(TypeExam::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => 'Glicemia',
		'deleted_at' => null
	];
});

$factory->define(TypeInstitution::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => 'Universidad',
		'deleted_at' => null
	];
});

$factory->define(TypeProfessionalLicense::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => 'Licencia B',
		'deleted_at' => null
	];
});

$factory->define(TypeSpeciality::class, function (Faker\Generator $faker)
{
	return [
		'id'         => 1,
		'name'       => 'Muebles y terminaciones de la madera',
		'deleted_at' => null
	];
});

$factory->define(TypeVehicle::class, function (Faker\Generator $faker)
{
	return [
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

$factory->define(Vehicle::class, function (Faker\Generator $faker)
{
	return [
		'acquisition_date' => Carbon::now()->format('d-m-Y'),
		'inscription_date' => Carbon::now()->format('d-m-Y'),
		'year'             => $faker->year,
		'patent'           => strtoupper($faker->randomLetter . $faker->randomLetter) . rand(1, 99) . rand(1, 99),
		'code'             => rand(10000000000000, 99999999999999),
		'created_at'       => Carbon::now()
	];
});

$factory->state(Vehicle::class, 'enable', function ()
{
	return [
		'state' => 'enable'
	];
});

$factory->state(Vehicle::class, 'disable', function ()
{
	return [
		'state' => 'disable'
	];
});

$factory->define(Weight::class, function (Faker\Generator $faker)
{
	return [
		'name'       => $faker->words(10, true),
		'acr'        => $faker->randomLetter . $faker->randomLetter,
		'deleted_at' => null
	];
});