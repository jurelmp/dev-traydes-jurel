<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/**
 * Create random users for testing
 */
$factory->define(Traydes\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->userName,
        'email' => $faker->email,
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/**
 * Create random categories for testing
 */
$factory->define(Traydes\Category::class, function (Faker\Generator $faker) {
    return [
        'parent_id' => mt_rand(null, 5),
        'name' => $faker->words(3, true),
        'description' => $faker->words(5, true),
    ];
});

/**
 * Create random posts to be assigned in category for testing
 */
$factory->define(Traydes\Post::class, function (Faker\Generator $faker) {
    return [
        'category_id' => mt_rand(1, 50),
        'user_id' => mt_rand(1, 10),
        'title' => $faker->words(4, true),
        'content' => join("\n\n", $faker->paragraphs(mt_rand(6, 20))),
        'published_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
    ];
});

/**
 * Create random images and path for the posts
 */
$factory->define(Traydes\PostImage::class, function (Faker\Generator $faker) {
    return [
        'post_id' => $faker->randomElement(Traydes\Post::all()->lists('id')->toArray()),
        'image_path' => $faker->imageUrl($width = 640, $height = 480, 'cats', true),
    ];
});