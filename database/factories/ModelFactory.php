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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'firstname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'login' => $faker->unique()->text(6),
        'password' => $password ?: $password = bcrypt('12345'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Announcement::class, function (Faker\Generator $faker) {

    return [
        'link' => $faker->url,
        'header' => $faker->text(200),
        'content' => $faker->paragraph(10),
        'site' => "asdasd.com",
        'type' => array_rand(\App\Library\MyClass::$announcementTypes, 1),
        'buldingType' => array_rand(\App\Library\MyClass::$buldingType, 1),
        'amount' => $faker->numberBetween(10,100000),
        'owner' => $faker->name,
        'date' => \App\Library\Date::d(null, "Y-m-d")
    ];
});

$factory->define(App\Models\Number::class, function (Faker\Generator $faker) {

    $number = $faker->phoneNumber;

    return [
        'number' => str_limit($number, 14, ''),
        'pure_number' => str_limit(\App\Library\MyHelper::pureNumber($number), 11, '')
    ];
});

$factory->define(App\Models\MskMakler::class, function (Faker\Generator $faker) {

    $number = $faker->phoneNumber;

    return [
        'fullname' => $faker->name,
        'number' => str_limit($number, 14, ''),
        'pure_number' => str_limit(\App\Library\MyHelper::pureNumber($number), 11, '')
    ];
});

$factory->define(App\Models\ProAnnouncement::class, function (Faker\Generator $faker) {

    $status = array_rand(\App\Library\MyClass::$buldingType, 1);

    return [
        'userId' => \App\User::all()->random()->id,
        'header' => $faker->text(200),
        'content' => $faker->paragraph(10),
        'type' => array_rand(\App\Library\MyClass::$announcementTypes, 1),
        'buldingType' => $status,
        'amount' => $faker->numberBetween(10,100000),
        'area' => $faker->numberBetween(10,1000),
        'roomCount' => $faker->numberBetween(1,50),
        'locatedFloor' => $faker->numberBetween(1,20),
        'floorCount' => $faker->numberBetween(1,20),
        'documentType' => array_rand(\App\Library\MyClass::$documentTypes, 1),
        'repairing' => array_rand(\App\Library\MyClass::$repairingTypes, 1),
        'locations' => (random_int(4000000000000000,4099999999999999)/100000000000000) . "," . (random_int(4900000000000000,4999999999999999)/100000000000000),
        'owner' => $faker->name,
        'status' => $status,
        'date' => \App\Library\Date::d(null, "Y-m-d")
    ];
});

$factory->define(App\Models\ProNumber::class, function (Faker\Generator $faker) {

    $number = $faker->phoneNumber;

    return [
        'number' => str_limit($number, 14, ''),
        'pure_number' => str_limit(\App\Library\MyHelper::pureNumber($number), 11, '')
    ];
});

$factory->define(App\Models\Tenant::class, function (Faker\Generator $faker) {

    $status = array_rand(\App\Library\MyClass::$buldingType, 1);

    return [
        'company_name' => $faker->company,
        'type' => array_rand(\App\Library\MyClass::$companyTypes, 1),
        'last_date' => \App\Library\Date::d(null, "Y-m-t")
    ];
});

$factory->define(App\Models\Group::class, function (Faker\Generator $faker) {

    $privArr = [];
    foreach (\App\Library\MyClass::$modules as $module)
    {
        if( isset($module['child']) )
        {
            foreach ($module['child'] as $m)
            {
                $privArr[$m['route']] = 3;
            }
        }
        else
        {
            $privArr[$module['route']] = 3;
        }
    }

    return [
        'group_name' => "Admin",
        'available_types' => json_encode(array_keys(\App\Library\MyClass::$announcementTypes), false),
        'available_building_types' => json_encode(array_keys(\App\Library\MyClass::$buldingType), false),
        'available_modules' => json_encode($privArr),
        'tenant_id' => 0,
    ];
});