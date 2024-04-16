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
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\FailedJob::class, static function (Faker\Generator $faker) {
    return [
        'uuid' => $faker->sentence,
        'connection' => $faker->text(),
        'queue' => $faker->text(),
        'payload' => $faker->text(),
        'exception' => $faker->text(),
        'failed_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Medium::class, static function (Faker\Generator $faker) {
    return [
        'model_type' => $faker->sentence,
        'model_id' => $faker->sentence,
        'uuid' => $faker->sentence,
        'collection_name' => $faker->sentence,
        'name' => $faker->firstName,
        'file_name' => $faker->sentence,
        'mime_type' => $faker->sentence,
        'disk' => $faker->sentence,
        'conversions_disk' => $faker->sentence,
        'size' => $faker->sentence,
        'order_column' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        'manipulations' => ['en' => $faker->sentence],
        'custom_properties' => ['en' => $faker->sentence],
        'generated_conversions' => ['en' => $faker->sentence],
        'responsive_images' => ['en' => $faker->sentence],
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Migration::class, static function (Faker\Generator $faker) {
    return [
        'migration' => $faker->sentence,
        'batch' => $faker->randomNumber(5),
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ModelHasPermission::class, static function (Faker\Generator $faker) {
    return [
        'permission_id' => $faker->sentence,
        'model_type' => $faker->sentence,
        'model_id' => $faker->sentence,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ModelHasRole::class, static function (Faker\Generator $faker) {
    return [
        'role_id' => $faker->sentence,
        'model_type' => $faker->sentence,
        'model_id' => $faker->sentence,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PasswordResetToken::class, static function (Faker\Generator $faker) {
    return [
        'email' => $faker->email,
        'token' => $faker->sentence,
        'created_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Permission::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'guard_name' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PersonalAccessToken::class, static function (Faker\Generator $faker) {
    return [
        'tokenable_type' => $faker->sentence,
        'tokenable_id' => $faker->sentence,
        'name' => $faker->firstName,
        'token' => $faker->sentence,
        'abilities' => $faker->text(),
        'last_used_at' => $faker->dateTime,
        'expires_at' => $faker->dateTime,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\RoleHasPermission::class, static function (Faker\Generator $faker) {
    return [
        'permission_id' => $faker->sentence,
        'role_id' => $faker->sentence,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'email' => $faker->email,
        'email_verified_at' => $faker->dateTime,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\WysiwygMedia::class, static function (Faker\Generator $faker) {
    return [
        'file_path' => $faker->sentence,
        'wysiwygable_id' => $faker->randomNumber(5),
        'wysiwygable_type' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ClassGroup::class, static function (Faker\Generator $faker) {
    return [
        'class_name' => $faker->sentence,
        'start_date' => $faker->date(),
        'end_date' => $faker->date(),
        'semester' => $faker->sentence,
        'year_of_study' => $faker->sentence,
        'teacher_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Subject::class, static function (Faker\Generator $faker) {
    return [
        'subject_name' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ClassHasSubject::class, static function (Faker\Generator $faker) {
    return [
        'class_group_id' => $faker->randomNumber(5),
        'subject_id' => $faker->randomNumber(5),
        'day' => $faker->sentence,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\StudentHasClass::class, static function (Faker\Generator $faker) {
    return [
        'student_id' => $faker->randomNumber(5),
        'class_group_id' => $faker->randomNumber(5),
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Raport::class, static function (Faker\Generator $faker) {
    return [
        'student_id' => $faker->randomNumber(5),
        'class_group_id' => $faker->randomNumber(5),
        'given_in' => $faker->sentence,
        'signed_at' => $faker->date(),
        'published' => $faker->boolean(),
        'moral_religious' => $faker->text(),
        'social_emotion' => $faker->text(),
        'speaking' => $faker->text(),
        'cognitive' => $faker->text(),
        'physical' => $faker->text(),
        'art' => $faker->text(),
        'sick' => $faker->randomNumber(5),
        'permission' => $faker->randomNumber(5),
        'absence' => $faker->randomNumber(5),
        'note' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\RaportHasMark::class, static function (Faker\Generator $faker) {
    return [
        'raport_id' => $faker->randomNumber(5),
        'subject_id' => $faker->randomNumber(5),
        'mark' => $faker->sentence,
        'note' => $faker->text(),
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Student::class, static function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'nick_name' => $faker->sentence,
        'registration_number' => $faker->sentence,
        'gender' => $faker->sentence,
        'place_of_birth' => $faker->sentence,
        'date_of_birth' => $faker->date(),
        'address' => $faker->text(),
        'email' => $faker->email,
        'status' => $faker->sentence,
        'child' => $faker->randomNumber(5),
        'number_of_children' => $faker->randomNumber(5),
        'father_name' => $faker->sentence,
        'father_occupation' => $faker->sentence,
        'father_phone_number' => $faker->sentence,
        'mother_name' => $faker->sentence,
        'mother_occupation' => $faker->sentence,
        'mother_phone_number' => $faker->sentence,
        'family_address' => $faker->text(),
        'emergency_contact_name' => $faker->sentence,
        'emergency_contact_occupation' => $faker->sentence,
        'emergency_contact_phone_number' => $faker->sentence,
        'emergency_contact_address' => $faker->text(),
        'registration_date' => $faker->date(),
        'start_date' => $faker->date(),
        'end_date' => $faker->date(),
        'class_id' => $faker->sentence,
        'login_id' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
