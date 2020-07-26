<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Complaint;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
//        'surname' => $faker->sentence,
        'number' => $faker->numberBetween(1,10),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('password'),
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Complaint::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'company_name' => $faker->company,
        'commenttitle' => $faker->text,
        'compphoto' => $faker->image(),
        'user_id' => Str::random(20),
    ];
});
