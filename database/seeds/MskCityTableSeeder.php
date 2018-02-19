<?php

use Illuminate\Database\Seeder;

class MskCityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $metro = new \App\Models\MskCity();
        $metro->name = "Bakı";
        $metro->save();

        $metro = new \App\Models\MskCity();
        $metro->name = "Astara";
        $metro->save();

        $metro = new \App\Models\MskCity();
        $metro->name = "Quba";
        $metro->save();

        $metro = new \App\Models\MskCity();
        $metro->name = "Qusar";
        $metro->save();

        $metro = new \App\Models\MskCity();
        $metro->name = "Sumqayit";
        $metro->save();
    }
}
