<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'thumbnail' => '/photos/7TaexOhE3bY10qms8bs3n0aRlb9YQ0RWibNVOHWE.jpeg',
        'summary' => $faker->paragraph
    ];
});
