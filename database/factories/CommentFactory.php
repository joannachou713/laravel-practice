<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;
use App\Post as PostEloquent;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id' => PostEloquent::inRandomOrder()->first()->id,
        'user_id' => PostEloquent::inRandomOrder()->first()->id,
        'content' => $faker->sentence,
    ];
});
