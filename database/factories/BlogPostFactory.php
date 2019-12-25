<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BlogPost;
use Faker\Generator as Faker;

$factory->define(BlogPost::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(10),
        'content' => $faker->paragraphs(10, true),
    ];
});

$factory->state(BlogPost::class, 'test-new-title', function (Faker $faker) {
    return [
        'title' => 'New title of post',
        'content' => 'There is not log new content of post',
    ];
});