<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Repo;
use Faker\Generator as Faker;

$factory->define(Repo::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'url' => $faker->url,
    ];
});
