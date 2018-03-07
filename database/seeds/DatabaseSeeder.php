<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MskTypeTableSeeder::class);
        $this->call(UserTableSeeder::class );
        $this->call(MskCityTableSeeder::class);
        $this->call(AnnouncementTableSeeder::class);
        $this->call(ProAnnouncementTableSeeder::class);
        $this->call(TenantTableSeeder::class);
    }
}
