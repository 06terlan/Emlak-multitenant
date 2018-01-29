<?php

use Illuminate\Database\Seeder;

class TenantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Tenant::class, 15)->create()
            ->each(function ($tenant){
                $group = factory(\App\Models\Group::class)->make();
                $tenant->groups()->save($group);

                $user = factory(\App\User::class)->make();
                $user->group_id = $group->id;
                $tenant->users()->save($user);
            });
    }
}
