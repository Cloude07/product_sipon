<?php

use Faker\Generator as Faker;
use App\Product;


$factory->define(App\Product::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->words(5, true),
        'price' => $faker->text(100),
        'user_id' => factory(App\User::class)->create()->id,
    ];
});
