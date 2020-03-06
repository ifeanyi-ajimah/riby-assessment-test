<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use App\Repo;
use App\User;

use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'type' => $faker->name,
        'user_id' => function(){
            return User::all()->random();
        },
        'repo_id' => function(){
            return Repo::all()->random();
        },
    ];
});










