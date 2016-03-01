<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ManpowerTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {

            $maleSurname   = $faker->lastName;
            $femaleSurname = $faker->lastName;
            $firstName     = $faker->firstName;
            $secondName    = $faker->firstName;

            \DB::table('manpowers')->insert(array(
                'male_surname'   => $maleSurname,
                'female_surname' => $femaleSurname,
                'first_name'     => $firstName,
                'second_name'    => $secondName,
                'full_name'      => "$firstName $secondName $maleSurname $femaleSurname",
                'rut'            => $faker->numberBetween($min = 10000000, $max = 20000000),
                'birthday'       => $faker->unixTime,
                'country_id'     => rand(1,9),
                'gender_id'      => rand(1,2),
                'forecast_id'    => rand(1,4),
                'mutuality_id'   => rand(1,4),
                'pension_id'     => rand(1,6),
                'rating_id'      => rand(1,4),
                'address'        => $faker->address,
                'commune_id'     => rand(1,53),
                'email'          => $faker->unique()->email,
                'phone1'         => $faker->phoneNumber,
                'phone2'         => $faker->phoneNumber,
            ));
        }
    }
}
