<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return [
        //
    ];
});

$addProfiletoAuthor = function ($author, $faker) {
    $author->profile()->save(factory(App\Profile::class)->make());
};

$factory->afterCreating(Author::class, $addProfiletoAuthor);
$factory->afterMaking(Author::class, $addProfiletoAuthor);

