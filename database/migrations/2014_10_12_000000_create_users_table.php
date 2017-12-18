<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Library\MyClass;

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
            $table->boolean('deleted')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        //auto insert an admin
        $user = new User();
        $user->firstname = "Admin";
        $user->email = "example@example.com";
        $user->login = "admin";
        $user->password = Hash::make("123456");
        $user->role = MyClass::ADMIN_ROLE;
        $user->save();
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
