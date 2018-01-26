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
                $user = factory(\App\User::class)->make();
                $tenant->users()->save($user);
            });
    }
}
