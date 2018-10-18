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
            $table->string('name');
            $table->boolean('admin')->default(0);
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            $table->string('birthday')->nullable();
            $table->string('department')->nullable();
            $table->string('section')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->time('deleted_at')->nullable();

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
