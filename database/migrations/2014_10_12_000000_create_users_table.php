<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname',50);
            $table->string('surname',50)->nullable();
            $table->string('email',60)->unique();
            $table->string('login',60)->unique();
            $table->string('password');
            $table->string('thumb',50)->nullable();
            $table->tinyInteger('role');
            $table->json('availableTypes');
            $table->json('availableBuildingTypes');
            $table->boolean('deleted')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
