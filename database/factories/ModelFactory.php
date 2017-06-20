<?php

use Carbon\Carbon;
use Controlqtime\Core\Api\Entities\AccessControlApi;
use Controlqtime\Core\Api\Entities\DailyAssistanceApi;
use Controlqtime\Core\Entities\Address;
use Controlqtime\Core\Entities\Area;
use Controlqtime\Core\Entities\City;
use Controlqtime\Core\Entities\Commune;
use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Entities\ContactEmployee;
use Controlqtime\Core\Entities\Contract;
use Controlqtime\Core\Entities\Country;
use Controlqtime\Core\Entities\DateDocumentationVehicle;
use Controlqtime\Core\Entities\DayTrip;
use Controlqtime\Core\Entities\Degree;
use Controlqtime\Core\Entities\DetailAddressCompany;
use Controlqtime\Core\Entities\DetailAddressLegalEmployee;
use Controlqtime\Core\Entities\DetailBus;
use Controlqtime\Core\Entities\DetailVehicle;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Entities\EngineCubic;
use Controlqtime\Core\Entities\FamilyResponsability;
use Controlqtime\Core\Entities\Forecast;
use Controlqtime\Core\Entities\Fuel;
use Controlqtime\Core\Entities\Image;
use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Entities\LaborUnion;
use Controlqtime\Core\Entities\LegalRepresentative;
use Controlqtime\Core\Entities\MaritalStatus;
use Controlqtime\Core\Entities\MasterFormPieceVehicle;
use Controlqtime\Core\Entities\ModelVehicle;
use Controlqtime\Core\Entities\Mutuality;
use Controlqtime\Core\Entities\Nationality;
use Controlqtime\Core\Entities\Pension;
use Controlqtime\Core\Entities\PieceVehicle;
use Controlqtime\Core\Entities\Position;
use Controlqtime\Core\Entities\Profession;
use Controlqtime\Core\Entities\Province;
use Controlqtime\Core\Entities\Region;
use Controlqtime\Core\Entities\Relationship;
use Controlqtime\Core\Entities\StatePieceVehicle;
use Controlqtime\Core\Entities\StateVehicle;
use Controlqtime\Core\Entities\TermAndObligatory;
use Controlqtime\Core\Entities\Terminal;
use Controlqtime\Core\Entities\Trademark;
use Controlqtime\Core\Entities\TypeCertification;
use Controlqtime\Core\Entities\TypeCompany;
use Controlqtime\Core\Entities\TypeContract;
use Controlqtime\Core\Entities\TypeDisability;
use Controlqtime\Core\Entities\TypeDisease;
use Controlqtime\Core\Entities\TypeExam;
use Controlqtime\Core\Entities\TypeInstitution;
use Controlqtime\Core\Entities\TypeProfessionalLicense;
use Controlqtime\Core\Entities\TypeSpeciality;
use Controlqtime\Core\Entities\TypeVehicle;
use Controlqtime\Core\Entities\User;
use Controlqtime\Core\Entities\Vehicle;
use Controlqtime\Core\Entities\Visit;
use Controlqtime\Core\Entities\Weight;
use Illuminate\Support\Str;

$factory->define(AccessControlApi::class, function (Faker\Generator $faker) {
    return [
        'employee_id' => 1,
        'rut'         => '17032680-6',
        'num_device'  => $faker->macAddress,
        'status'      => $faker->boolean,
        'created_at'  => Carbon::now(),
    ];
});

$factory->define(Address::class, function (Faker\Generator $faker) {
    return [
        'addressable_id'   => factory(Employee::class)->states('enable')->create(),
        'addressable_type' => 'Controlqtime\Core\Entities\Employee',
        'address'          => $faker->address,
        'commune_id'       => 1,
        'phone1'           => $faker->word,
        'phone2'           => $faker->word,
    ];
});

$factory->define(Area::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->word,
        'terminal_id' => factory(Terminal::class)->create()->id,
    ];
});

$factory->define(City::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'country_id' => factory(Country::class)->create()->id,
    ];
});

$factory->define(Commune::class, function (Faker\Generator $faker) {
    return [
        'province_id' => factory(Province::class)->create()->id,
        'name'        => $faker->word,
    ];
});

$factory->define(Company::class, function (Faker\Generator $faker) {
    return [
        'type_company_id' => factory(TypeCompany::class)->create()->id,
        'rut'             => rand(100, 110).rand(100, 999).rand(100, 999).'-'.rand(1, 9),
        'firm_name'       => $faker->company.' '.$faker->companySuffix,
        'gyre'            => $faker->sentence,
        'start_act'       => $faker->date($format = 'd-m-Y', $max = 'now'),
        'muni_license'    => strtoupper($faker->word),
        'email_company'   => $faker->email,
    ];
});

$factory->state(Company::class, 'enable', function () {
    return [
        'state' => 'enable',
    ];
});

$factory->state(Company::class, 'disable', function () {
    return [
        'state' => 'disable',
    ];
});

$factory->define(ContactEmployee::class, function (Faker\Generator $faker) {
    return [
        'contact_relationship_id' => factory(Relationship::class)->create()->id,
        'name_contact'            => $faker->firstName.' '.$faker->lastName,
        'email_contact'           => $faker->email,
        'address_contact'         => $faker->address,
        'tel_contact'             => '+56974155784',
    ];
});

$factory->define(Contract::class, function (Faker\Generator $faker) {
    return [
        'company_id'       => factory(Company::class)->states('enable')->create()->id,
        'employee_id'      => factory(Employee::class)->states('enable')->create()->id,
        'start_contract'   => Carbon::parse('2016-12-13')->format('d-m-Y'),
        'position_id'      => factory(Position::class)->create()->id,
        'area_id'          => factory(Area::class)->create()->id,
        'type_contract_id' => factory(TypeContract::class)->create(['name' => 'Plazo Fijo'])->id,
        'num_hour'         => '45',
        'day_trip_id'      => factory(DayTrip::class)->create()->id,
        'forecast_id'      => factory(Forecast::class)->create()->id,
        'pension_id'       => factory(Pension::class)->create()->id,
        'init_morning'     => '09:00',
        'end_morning'      => '13:00',
        'init_afternoon'   => '14:00',
        'end_afternoon'    => '19:00',
        'salary'           => rand(100000, 6000000),
        'mobilization'     => rand(100000, 150000),
        'collation'        => rand(50000, 99000),
        'expires_at'       => Carbon::parse('+1 year'),
    ];
});

$factory->define(Country::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(DateDocumentationVehicle::class, function (Faker\Generator $faker) {
    return [
        'vehicle_id'            => factory(Vehicle::class)->states('enable')->create()->id,
        'emission_padron'       => Carbon::parse('-1 year')->format('d-m-Y'),
        'expiration_padron'     => Carbon::parse('+1 year')->format('d-m-Y'),
        'emission_insurance'    => Carbon::parse('-10 weeks')->format('d-m-Y'),
        'expiration_insurance'  => Carbon::parse('+2 years')->format('d-m-Y'),
        'emission_permission'   => Carbon::parse('-3 years')->format('d-m-Y'),
        'expiration_permission' => Carbon::parse('+5 years')->format('d-m-Y'),
    ];
});

$factory->define(DailyAssistanceApi::class, function (Faker\Generator $faker) {
    return [
        'employee_id' => 1,
        'rut'         => '17032680-6',
        'num_device'  => $faker->macAddress,
        'status'      => $faker->boolean,
        'created_at'  => Carbon::now(),
    ];
});

$factory->define(DayTrip::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(Degree::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(DetailAddressCompany::class, function (Faker\Generator $faker) {
    return [
        'lot'   => rand(1, 10).$faker->randomLetter,
        'bod'   => rand(1, 99),
        'ofi'   => rand(1, 10),
        'floor' => rand(1, 10),
    ];
});

$factory->define(DetailAddressLegalEmployee::class, function (Faker\Generator $faker) {
    return [
        'depto'    => rand(1, 999),
        'block'    => rand(1, 99),
        'num_home' => rand(1, 99),
    ];
});

$factory->define(DetailBus::class, function (Faker\Generator $faker) {
    return [
        'carr'       => $faker->word,
        'num_plazas' => rand(50, 100),
    ];
});

$factory->define(DetailVehicle::class, function (Faker\Generator $faker) {
    return [
        'vehicle_id'   => factory(Vehicle::class)->states('enable')->create()->id,
        'fuel_id'      => factory(Fuel::class)->create()->id,
        'color'        => $faker->word,
        'num_chasis'   => rand(10000000000000, 99999999999999),
        'num_motor'    => rand(10000000000, 99999999999),
        'km'           => rand(1, 200000),
        'engine_cubic' => rand(1000, 3000),
        'weight'       => rand(1000, 5000),
        'tag'          => rand(10000000000000, 99999999999999),
        'obs'          => $faker->paragraph,
    ];
});

$factory->define(Employee::class, function (Faker\Generator $faker) {
    $maleSurname = $faker->lastName;
    $femaleSurname = $faker->lastName;
    $firstName = $faker->firstName;
    $secondName = $faker->firstName;

    return [
        'nationality_id'    => factory(Nationality::class)->create()->id,
        'marital_status_id' => factory(MaritalStatus::class)->create()->id,
        'male_surname'      => $maleSurname,
        'female_surname'    => $femaleSurname,
        'first_name'        => $firstName,
        'second_name'       => $secondName,
        'full_name'         => "$firstName $secondName $maleSurname $femaleSurname",
        'doc'               => 'rut',
        'rut'               => rand(3, 24).rand(100, 999).rand(100, 999).'-'.rand(1, 9),
        'birthday'          => $faker->date($format = 'd-m-Y', $max = 'now'),
        'is_male'           => true,
        'email_employee'    => $faker->unique()->email,
        'url'               => 'https://s3-sa-east-1.amazonaws.com/biometry/faces/2016/07/18/200031564881.jpg',
        'created_at'        => Carbon::now(),
    ];
});

$factory->state(Employee::class, 'enable', function () {
    return [
        'state' => 'enable',
    ];
});

$factory->state(Employee::class, 'disable', function () {
    return [
        'state' => 'disable',
    ];
});

$factory->define(EngineCubic::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'acr'        => $faker->randomLetter.$faker->randomLetter,
        'deleted_at' => null,
    ];
});

$factory->define(FamilyResponsability::class, function (Faker\Generator $faker) {
    return [
        'employee_id'         => factory(Employee::class)->states('enable')->create()->id,
        'name_responsability' => $faker->firstName.' '.$faker->lastName,
        'rut_responsability'  => rand(3, 24).rand(100, 999).rand(100, 999).'-'.rand(1, 9),
        'relationship_id'     => factory(Relationship::class)->create()->id,
    ];
});

$factory->define(Forecast::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(Fuel::class, function (Faker\Generator $faker) {
    return [
        'name'       => rand(90, 99),
        'deleted_at' => null,
    ];
});

$factory->define(Image::class, function (Faker\Generator $faker) {
    return [
        'imageable_id'   => '',
        'imageable_type' => '',
        'path'           => $faker->word.'/'.$faker->word.'/'.$faker->word,
        'orig_name'      => Str::random(15).'.png',
        'size'           => $faker->numberBetween(10000, 20000),
    ];
});

$factory->define(Institution::class, function (Faker\Generator $faker) {
    return [
        'name'                => $faker->word.' '.$faker->word,
        'type_institution_id' => factory(TypeInstitution::class)->create()->id,
        'deleted_at'          => null,
    ];
});

$factory->define(LaborUnion::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(LegalRepresentative::class, function (Faker\Generator $faker) {
    return [
        'company_id'           => factory(Company::class)->states('enable')->create()->id,
        'male_surname'         => $faker->lastName,
        'female_surname'       => $faker->lastName,
        'first_name'           => $faker->firstName,
        'second_name'          => $faker->firstName,
        'rut_representative'   => rand(3, 24).'.'.rand(100, 999).'.'.rand(100, 999).'-'.rand(1, 9),
        'birthday'             => Carbon::parse('-20 years')->format('d-m-Y'),
        'nationality_id'       => factory(Nationality::class)->create()->id,
        'email_representative' => $faker->email,
    ];
});

$factory->define(MaritalStatus::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(MasterFormPieceVehicle::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(ModelVehicle::class, function (Faker\Generator $faker) {
    return [
        'trademark_id' => factory(Trademark::class)->create()->id,
        'name'         => $faker->word,
        'deleted_at'   => null,
    ];
});

$factory->define(Mutuality::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(Nationality::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(Pension::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'com'  => rand(0.01, 0.02),
    ];
});

$factory->define(PieceVehicle::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(Position::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(Profession::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(Province::class, function (Faker\Generator $faker) {
    return [
        'region_id' => factory(Region::class)->create()->id,
        'name'      => $faker->word,
    ];
});

$factory->define(Region::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(Relationship::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(StatePieceVehicle::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(StateVehicle::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(TermAndObligatory::class, function (Faker\Generator $faker) {
    return [
        'name'    => $faker->sentence,
        'default' => $faker->boolean,
    ];
});

$factory->define(Terminal::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'address'    => $faker->address,
        'commune_id' => factory(Commune::class)->create()->id,
        'deleted_at' => null,
        'created_at' => Carbon::now(),
    ];
});

$factory->define(Trademark::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(TypeCertification::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(TypeCompany::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(TypeContract::class, function (Faker\Generator $faker) {
    $dur = $faker->numberBetween(2, 12);

    return [
        'name'      => 'Plazo Fijo',
        'dur'       => $dur,
        'full_name' => "Plazo Fijo {$dur}",
    ];
});

$factory->define(TypeDisability::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(TypeDisease::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(TypeExam::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(TypeInstitution::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(TypeProfessionalLicense::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(TypeSpeciality::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->word,
        'deleted_at' => null,
    ];
});

$factory->define(TypeVehicle::class, function (Faker\Generator $faker) {
    return [
        'name'            => $faker->word,
        'engine_cubic_id' => factory(EngineCubic::class)->create()->id,
        'weight_id'       => factory(Weight::class)->create()->id,
        'deleted_at'      => null,
    ];
});

$factory->define(User::class, function (Faker\Generator $faker) {
    return [
        'employee_id' => factory(Employee::class)->states('enable')->create()->id,
        'email'       => $faker->email,
        'password'    => bcrypt("$faker->email"),
    ];
});

$factory->define(Vehicle::class, function (Faker\Generator $faker) {
    return [
        'user_id'          => factory(User::class)->create()->id,
        'type_vehicle_id'  => factory(TypeVehicle::class)->create()->id,
        'model_vehicle_id' => factory(ModelVehicle::class)->create()->id,
        'company_id'       => factory(Company::class)->states('enable')->create()->id,
        'state_vehicle_id' => factory(StateVehicle::class)->create()->id,
        'acquisition_date' => Carbon::now()->format('d-m-Y'),
        'inscription_date' => Carbon::now()->format('d-m-Y'),
        'year'             => $faker->year,
        'patent'           => strtoupper($faker->randomLetter.$faker->randomLetter).rand(1, 99).rand(1, 99),
        'code'             => rand(10000000000000, 99999999999999),
        'created_at'       => Carbon::now(),
    ];
});

$factory->state(Vehicle::class, 'enable', function () {
    return [
        'state' => 'enable',
    ];
});

$factory->state(Vehicle::class, 'disable', function () {
    return [
        'state' => 'disable',
    ];
});

$factory->define(Visit::class, function (Faker\Generator $faker) {
    $maleSurname = $faker->lastName;
    $femaleSurname = $faker->lastName;
    $firstName = $faker->firstName;
    $secondName = $faker->firstName;

    $rand = rand(1, 5);

    $date = [
        Carbon::parse('+5 days')->format('d-m-Y'),
        null,
        null,
        null,
        Carbon::parse('+5 days')->format('d-m-Y'),
    ];

    $hour = [
        '11:30',
        null,
        null,
        null,
        '12:45',
    ];

    $startDate = [
        null,
        Carbon::parse('+2 days')->format('d-m-Y'),
        Carbon::parse('+1 days')->format('d-m-Y'),
        Carbon::parse('+25 days')->format('d-m-Y'),
        null,
    ];

    $endDate = [
        null,
        Carbon::parse('+8 days')->format('d-m-Y'),
        Carbon::parse('+4 days')->format('d-m-Y'),
        Carbon::parse('+2 months')->format('d-m-Y'),
        null,
    ];

    $randUserEmployee = rand(1, 2);

    return [
        'user_id'        => $randUserEmployee,
        'type_visit_id'  => $rand,
        'employee_id'    => $randUserEmployee,
        'is_walking'     => $faker->randomElement(['0', '1']),
        'rut'            => rand(3, 24).'.'.rand(100, 999).'.'.rand(100, 999).'-'.rand(1, 9),
        'male_surname'   => $maleSurname,
        'female_surname' => $femaleSurname,
        'first_name'     => $firstName,
        'second_name'    => $secondName,
        'position'       => $faker->jobTitle,
        'company'        => $faker->company,
        'phone'          => $faker->e164PhoneNumber,
        'email'          => $faker->freeEmail,
        'date'           => $date[$rand - 1],
        'hour'           => $hour[$rand - 1],
        'start_date'     => $startDate[$rand - 1],
        'end_date'       => $endDate[$rand - 1],
        'obs'            => $faker->sentence,
        'url'            => 'sign-in-visits/visits-pendings/',
        'key'            => Str::random(10),
    ];
});

$factory->define(Weight::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'acr'  => $faker->randomLetter.$faker->randomLetter,
    ];
});
