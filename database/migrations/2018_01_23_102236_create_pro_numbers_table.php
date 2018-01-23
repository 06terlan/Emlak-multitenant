<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_numbers', function (Blueprint $table) {
            $table->integer('pro_announcement_id')->unsigned();
            $table->string("number",14);
            $table->string("pure_number",11);

            $table->foreign('pro_announcement_id')->references('id')->on('pro_announcements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pro_numbers');
    }
}
