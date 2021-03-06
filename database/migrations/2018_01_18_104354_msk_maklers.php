<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MskMaklers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msk_maklers', function (Blueprint $table) {
            $table->increments('id');
            $table->string("fullname",30);
            $table->string("number",14);

            $table->string("pure_number",11)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('msk_maklers');
    }
}
