<?php

use App\User;
use App\Project;
use App\Task;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Project::class, function (Faker $faker) {
    // 집계함수를 사용하여 id 의 최소, 최대값을 가져옴
    $min = User::min('id');  // 1
    $max = User::max('id'); 
    return [
        'user_id' => $faker->numberBetween($min, $max),   // 2
        'name' => substr($faker->word, 0, 20),            // 3
        'description' => $faker->sentence,                // 4
        'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = '-1 years'),  //5
        'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),           //6
    ];
});
 
$factory->define(Task::class, function (Faker $faker) {
    // 집계함수를 사용하여 id 의 최소, 최대값을 가져옴
    $min = Project::min('id');
    $max = Project::max('id');
 
    $dt = $faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now');   // 7
 
    return [
        'project_id' => $faker->numberBetween($min, $max),
        'name' => substr($faker->sentence, 0, 20),
        'description' => $faker->text,
        'due_date' => $faker->dateTimeBetween($startDate = '-1 months', $endDate = '+1 months'),  // 8
        'created_at' => $dt,
        'updated_at' => $dt,
    ];
});