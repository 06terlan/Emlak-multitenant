<?php

use Illuminate\Database\Seeder;

class MskTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $privArr = [];
        foreach (\App\Library\MyClass::$modules as $module)
        {
            if( isset($module['child']) )
            {
                foreach ($module['child'] as $m)
                {
                    $privArr[$m['route']] = 2;
                }
            }
            else
            {
                $privArr[$module['route']] = 2;
            }
        }

        $type = new \App\Models\MskType();
        $type->name = "Böyük şirkət";
        $type->available_modules = json_encode($privArr);
        $type->user_count = 10;
        $type->save();
    }
}
