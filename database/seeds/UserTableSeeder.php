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
        $tenant = new \App\Models\Tenant();
        $tenant->company_name = "Owner";
        $tenant->last_date = \App\Library\Date::d(null, "Y-m-d");
        $tenant->type = 'big_company';
        $tenant->save();

        //auto insert an super admin
        $user = new User();
        $user->firstname = "SuperAdmin";
        $user->email = "example@example.com";
        $user->login = "admin";
        $user->password = Hash::make("123456");
        $user->availableTypes = json_encode(array_keys(MyClass::$announcementTypes), false);
        $user->availableBuildingTypes = json_encode(array_keys(MyClass::$buldingType), false);
        $user->role = MyClass::SUPER_ADMIN_ROLE;
        $tenant->users()->save($user);
        //$user->save();

        //auto insert an admin
        $user = new User();
        $user->firstname = "Admin";
        $user->email = "example1@example.com";
        $user->login = "admin1";
        $user->password = Hash::make("123456");
        $user->availableTypes = json_encode(array_keys(MyClass::$announcementTypes), false);
        $user->availableBuildingTypes = json_encode(array_keys(MyClass::$buldingType), false);
        $user->role = MyClass::ADMIN_ROLE;
        $tenant->users()->save($user);
        //$user->save();
    }
}
