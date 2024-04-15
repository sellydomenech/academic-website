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
$factory->define(App\Models\Teacher::class, static function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'nik' => $faker->sentence,
        'date_of_birth' => $faker->date(),
        'phone_number' => $faker->randomNumber(5),
        'address' => $faker->text(),
        'email' => $faker->email,
        'registration_date' => $faker->date(),
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Role::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'guard_name' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Activation::class, static function (Faker\Generator $faker) {
    return [
        'email' => $faker->email,
        'token' => $faker->sentence,
        'used' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\AdminActivation::class, static function (Faker\Generator $faker) {
    return [
        'email' => $faker->email,
        'token' => $faker->sentence,
        'used' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\AdminPasswordReset::class, static function (Faker\Generator $faker) {
    return [
        'email' => $faker->email,
        'token' => $faker->sentence,
        'created_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\AdminUser::class, static function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => $faker->boolean(),
        'forbidden' => $faker->boolean(),
        'language' => $faker->sentence,
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
        
    ];
});
