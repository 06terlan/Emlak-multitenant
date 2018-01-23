<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Library\MyClass;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //auto insert an admin
        $user = new User();
        $user->firstname = "Admin";
        $user->email = "example@example.com";
        $user->login = "admin";
        $user->password = Hash::make("123456");
        $user->availableTypes = json_encode(array_keys(MyClass::$announcementTypes), false);
        $user->availableBuildingTypes = json_encode(array_keys(MyClass::$buldingType), false);
        $user->role = MyClass::ADMIN_ROLE;
        $user->save();
    }
}
