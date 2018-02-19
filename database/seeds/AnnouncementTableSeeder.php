<?php

use Illuminate\Database\Seeder;

class AnnouncementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Announcement::class, 100)->create()
            ->each(function ($announcement){
                $number = factory(\App\Models\Number::class)->make();
                $announcement->numbers()->save($number);

                if(rand(0,1))
                {
                    $makler = factory(\App\Models\MskMakler::class)->make();
                    $makler->number = $number->number;
                    $makler->pure_number = $number->pure_number;
                    $makler->save();

                    $announcement->owner_type = 1;
                    $announcement->save();
                }
            });
    }
}
