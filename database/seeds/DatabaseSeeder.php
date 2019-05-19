<?php

use App\SongModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('categories')->insert([
            'name' => 'Kuş Sesleri',
            'img' => 'kus.jpg',
        ]);
        DB::table('categories')->insert([
            'name' => 'Piyano Sesleri',
            'img' => 'piano.jpg',
        ]);
        DB::table('categories')->insert([
            'name' => 'Piyano Sesleri',
            'img' => 'doga.jpg',
        ]);


        for ($i = 0; $i < 4; $i++) {
            SongModel::create([
                'name' => $faker->name,
                'category_id' => 1,
            ]);
        }

        for ($i = 0; $i < 4; $i++) {
            SongModel::create([
                'name' => $faker->name,
                'category_id' => 2,
            ]);
        }

        for ($i = 0; $i < 4; $i++) {
            SongModel::create([
                'name' => $faker->name,
                'category_id' => 3,
            ]);
        }
    }


}
