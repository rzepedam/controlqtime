<?php

use Controlqtime\Core\Entities\Image;
use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->truncate();

        if (getenv('APP_ENV') === 'local') {
            Image::create([
                'imageable_id'   => 1,
                'imageable_type' => 'Controlqtime\Core\Entities\Company',
                'path'           => 'company/1/Rol/14790871284R21I7qMyakUjiI.jpg',
                'orig_name'      => '14790871284R21I7qMyakUjiI.jpg',
                'size'           => '2286997',
            ]);

            Image::create([
                'imageable_id'   => 1,
                'imageable_type' => 'Controlqtime\Core\Entities\Company',
                'path'           => 'company/1/Patent/1479087473rG8GcPtiIeFaM1Q.JPG',
                'orig_name'      => '1479087473rG8GcPtiIeFaM1Q.JPG',
                'size'           => '2016871',
            ]);

            Image::create([
                'imageable_id'   => 1,
                'imageable_type' => 'Controlqtime\Core\Entities\Company',
                'path'           => 'company/1/Carnet/1479087399YpK2Wg2f3DvVcuj.png',
                'orig_name'      => '1479087399YpK2Wg2f3DvVcuj.png',
                'size'           => '359762',
            ]);

            Image::create([
                'imageable_id'   => 1,
                'imageable_type' => 'Controlqtime\Core\Entities\Company',
                'path'           => 'company/1/Carnet/1479087461vo2OlYDkbWEfuX0.png',
                'orig_name'      => '1479087461vo2OlYDkbWEfuX0.png',
                'size'           => '371219',
            ]);
        }
    }
}
