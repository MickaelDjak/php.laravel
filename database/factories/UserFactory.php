<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$xOeiYGfMhpI9IHoKHev07e3dWU8XmrNKy3h6ta20yYEHh/.3MA9i6',
        'remember_token' => Str::random(10),
    ];
});

$factory->state(User::class, 'mdjak', function () {
    return [
        'name' => 'Михаил Дьяк',
        'email' => '23djak@gmail.com',
        'password' => '$2y$10$xOeiYGfMhpI9IHoKHev07e3dWU8XmrNKy3h6ta20yYEHh/.3MA9i6',
    ];
});
