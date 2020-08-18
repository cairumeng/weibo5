<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Follower;
use Faker\Generator as Faker;

$factory->define(Follower::class, function (Faker $faker) {
    $user_ids = User::orderBy('id', 'asc')->limit(20)->pluck('id');
    $user_id = $faker->randomElement($user_ids);
    $follower_ids = array_filter($user_ids->toArray(), function ($id) use ($user_id) {
        return $user_id !== $id;
    });
    return [
        'user_id' => $user_id,
        'follower_id' => $faker->randomElement($follower_ids),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
