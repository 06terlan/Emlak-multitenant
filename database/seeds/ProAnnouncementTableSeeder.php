<?php

use Illuminate\Database\Seeder;

class ProAnnouncementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\ProAnnouncement::class, 10)->create()
            ->each(function ($announcement){
                $number = factory(\App\Models\ProNumber::class)->make();
                $announcement->numbers()->save($number);
            });
    }
}
