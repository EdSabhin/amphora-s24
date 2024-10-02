<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Article::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'visible' => $faker->boolean(),
        'title' => $faker->sentence,
        'subHeadline' => $faker->sentence,
        'article' => $faker->sentence,
        'image' => $faker->sentence,
        'video' => $faker->sentence,
        'audio' => $faker->sentence,
        'videoUrl' => $faker->sentence,
        'audioUrl' => $faker->sentence,
        'file' => $faker->sentence,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Article::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'visible' => $faker->boolean(),
        'title' => $faker->sentence,
        'subHeadline' => $faker->sentence,
        'article' => $faker->sentence,
        'image' => $faker->sentence,
        'video' => $faker->sentence,
        'audio' => $faker->sentence,
        'videoUrl' => $faker->sentence,
        'audioUrl' => $faker->sentence,
        'file' => $faker->sentence,
        
        
    ];
});
