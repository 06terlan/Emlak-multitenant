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
            $table->integer("userId")->unsigned();
            $table->string('header',200)->nullable();
            $table->longText('content')->nullable();
            $table->string('type',50)->nullable();
            $table->string('type2',5)->nullable(); //new
            $table->tinyInteger("buldingType");
            $table->decimal('amount',10,2)->nullable();
            $table->smallInteger("area")->nullable();
            $table->tinyInteger("roomCount")->nullable();
            $table->smallInteger("locatedFloor")->nullable();
            $table->smallInteger("floorCount")->nullable();
            $table->tinyInteger("documentType");
            $table->tinyInteger("repairing");

            $table->integer("metro_id")->nullable();
            $table->smallInteger("city_id")->nullable();
            $table->string("owner", 40)->nullable();
            $table->string('link', 200)->nullable();
            $table->string('locations', 50)->nullable();
            $table->string("place", 20)->nullable(); //new
            $table->date('date');

            $table->tinyInteger("status");

            $table->boolean('deleted')->default(0);
            $table->unsignedInteger('tenant_id');
            $table->timestamps();

            //
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
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
