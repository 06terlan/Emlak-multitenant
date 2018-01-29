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


        //super admin group
        $groupSuper = factory(\App\Models\Group::class)->make();
        $groupSuper->group_name = "Super Admin";
        $groupSuper->super_admin = 1;
        $tenant->groups()->save($groupSuper);

        //admin group
        $group = factory(\App\Models\Group::class)->make();
        $tenant->groups()->save($group);


        //auto insert an super admin
        $user = new User();
        $user->group_id = $groupSuper->id;
        $user->firstname = "SuperAdmin";
        $user->email = "example@example.com";
        $user->login = "admin";
        $user->password = Hash::make("123456");
        $user->role = MyClass::SUPER_ADMIN_ROLE;
        $tenant->users()->save($user);

        //auto insert an admin
        $user = new User();
        $user->group_id = $group->id;
        $user->firstname = "Admin";
        $user->email = "example1@example.com";
        $user->login = "admin1";
        $user->password = Hash::make("123456");
        $user->role = MyClass::ADMIN_ROLE;
        $tenant->users()->save($user);
    }
}
