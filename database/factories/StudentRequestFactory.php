
<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\StudentRequest;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

$factory->define(StudentRequest::class, function (Faker $faker) {
    return [
        'student_id' => factory(App\Student::class),
        'level' => Arr::random([1,2,3])
    ];
});
