<?php

use App\Gender;
use Illuminate\Database\Seeder;


class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            ['short_name' => 'M', 'name' => 'Male'],
            ['short_name' => 'F', 'name' => 'Female'],
        ];

        foreach ($genders as $gender) {
            Gender::firstOrCreate([
                'short_name' => $gender['short_name'],
                'name' => $gender['name'],
            ]);
        }
    }
}
