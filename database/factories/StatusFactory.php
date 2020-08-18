<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Status;
use Faker\Generator as Faker;

$factory->define(Status::class, function (Faker $faker) {
    $user_ids = User::orderBy('id', 'asc')->limit(10)->pluck('id');
    return [
        'user_id' => $faker->randomElement($user_ids),
        'content' => $faker->text(),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
