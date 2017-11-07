<?php
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;
    
    return [
        'full_name' => $faker->name,
        'email' => $faker->unique()->email,
        'password' => $password ?: $password = bcrypt('secret'),
        'avatar' => config('setting.defaultAvatar'),
        'address' => $faker->address,
        'gender' => $faker->randomElement($array = array(0, 1)),
        'level' => $faker->randomElement($array = array(0, 1)),
    ];
});

$factory->define(App\Models\Service::class, function (Faker\Generator $faker) {
    return [
        'category_id' => function () {
            return App\Models\Category::pluck('id')
                ->random(1)
                ->first();
        },
        'province_id' => function () {
            return App\Models\Province::pluck('id')
                ->random(1)
                ->first();
        },
        'name' => $faker->name,
        'price' => $faker->numberBetween(120, 500),
        'rate' => $faker->numberBetween(1, 5),
        'description' => $faker->text(30),
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text(15),
        'user_id' => function () {
            return App\Models\User::pluck('id')
                ->random(1)
                ->first();
        },
        'content' => $faker->text(50),
        'summary' => $faker->text(20),
    ];
});

$factory->define(App\Models\Comment::class, function (Faker\Generator $faker) {
    return [
        'post_id' => function () {
            return App\Models\Post::pluck('id')
                ->random(1)
                ->first();
        },
        'user_id' => function () {
            return App\Models\User::pluck('id')
                ->random(1)
                ->first();
        },
        'content' => $faker->text(50),
    ];
});

$factory->define(App\Models\Plan::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function () {
            return App\Models\User::pluck('id')
                ->random(1)
                ->first();
        },
        'title' => $faker->text(15),
        'description' => $faker->text(50),
        'start_at' => $faker->dateTime(),
        'end_at' => $faker->dateTime(),
        'rate_average' => 5,
        'rate_count' => 5,
        'price' => $faker->numberBetween(1000, 3000),
        'status' => config('setting.status.approved'),
    ];
});

$factory->define(App\Models\Follow::class, function (Faker\Generator $faker) {
    return [
        'follower_id' => $faker->numberBetween(1, 5),
        'following_id' => $faker->numberBetween(5, 10),
    ];
});

$factory->define(App\Models\Schedule::class, function (Faker\Generator $faker) {
    return [
        'plan_id' => function () {
            return App\Models\Plan::pluck('id')
                ->random(1)
                ->first();
        },
        'service_id' => function () {
            return App\Models\Service::pluck('id')
                ->random(1)
                ->first();
        },
        'start_at' => $faker->dateTime(),
        'end_at' => $faker->dateTime(),
        'date' => $faker->numberBetween(1, 4),
        'title' => $faker->text(30),
        'price' => $faker->numberBetween(50, 150),
        'description' => $faker->text(50),
    ];
});

$factory->define(App\Models\PlanProvince::class, function (Faker\Generator $faker) {
    return [
        'plan_id' => function () {
            return App\Models\Plan::pluck('id')
                ->random(1)
                ->first();
        },
        'province_id' => function () {
            return App\Models\Province::pluck('id')
                ->random(1)
                ->first();
        },
    ];
});

$factory->define(App\Models\Province::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});
