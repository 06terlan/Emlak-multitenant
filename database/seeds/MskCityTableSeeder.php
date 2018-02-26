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
        $cities = ["Ağstafa","Ağsu","Abşeron","Bakı","Balakən","Beyləqan","Bərdə","Cəlilabad","Göyçay","Gəncə","Kürdəmir","Lənkəran","Masallı","Mingəçevir","Naxçıvan","Neftçala","Oğuz","Qax","Qazax","Quba","Qusar","Qəbələ","Saatlı","Sabirabad","Salyan","Sumqayıt","Tovuz","Xaçmaz","Xudat","Xırdalan","Xızı","Zaqatala","İsmayıllı","Şabran","Şamaxı","Şirvan","Şəki","Şəmkir","Ağcəbədi","Ağdam","Ağdaş","Biləsuvar","Cəbrayıl","Daşkəsən","Dəliməmmədli","Fizuli","Gədəbəy","Goranboy","Göygöl","Göytəpə","Hacıqabul","Horadiz","İmişli","Kəlbəcər","Laçın","Lerik","Liman","Naftalan","Qobustan","Qubadlı","Samux","Siyəzən","Şuşa","Tərtər","Nabran","Xocavənd","Yardımlı","Yevlax","Zəngilan","Zərdab"];

        foreach ($cities as $city)
        {
            $metro = new \App\Models\MskCity();
            $metro->name = $city;
            $metro->pure_name = \App\Library\MyHelper::pureString($city);
            $metro->save();
        }
    }
}
