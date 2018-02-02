<?php

use Illuminate\Database\Seeder;

class MskMetroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $metro = new \App\Models\MskMetro();
        $metro->name = "Genclik";
        $metro->save();

        $metro = new \App\Models\MskMetro();
        $metro->name = "Nerimanov";
        $metro->save();

        $metro = new \App\Models\MskMetro();
        $metro->name = "28 May";
        $metro->save();

        $metro = new \App\Models\MskMetro();
        $metro->name = "Ulduz";
        $metro->save();

        $metro = new \App\Models\MskMetro();
        $metro->name = "Q.Qarayev";
        $metro->save();
    }
}
