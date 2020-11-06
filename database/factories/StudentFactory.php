
<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use App\User;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

$disability = ['none'];
$sponsor = ['gvt', 'private'];

$factory->define(Student::class, function (Faker $faker) use($disability ,$sponsor) {
    return [
        'user_id' => factory(App\Student::class),
        'full_name' => $faker->name,
        'email' => $faker->email,
        'email_verified_at' => now(),
        'reg_no' => title_case(str_random(6)),
        'disability' => Arr::random($disability),
        'gender_id' => Arr::random([1,2]),
        'sponsor' => Arr::random($sponsor),
        'phone_number' => '0'.rand(650000000,840000000),
        
    ];
});
