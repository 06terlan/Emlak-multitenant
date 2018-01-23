<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProAnnouncement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("userId")->references('id')->on('users')->onDelete('cascade');
            $table->string('header',200)->nullable();
            $table->longText('content')->nullable();
            $table->string('type',50)->nullable();
            $table->tinyInteger("buldingType");
            $table->decimal('amount',10,2)->nullable();
            $table->integer("area")->nullable();
            $table->tinyInteger("roomCount")->nullable();
            $table->smallInteger("locatedFloor")->nullable();
            $table->smallInteger("floorCount")->nullable();
            $table->tinyInteger("documentType");
            $table->tinyInteger("repairing");

            $table->string("metro",20)->nullable();
            $table->string("city", 20)->nullable();
            $table->string("owner", 40)->nullable();
            //$table->json("mobnom")->nullable();
            $table->string('link', 200)->nullable();
            $table->date('date');

            $table->tinyInteger("status");

            $table->boolean('deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pro_announcements');
    }
}
