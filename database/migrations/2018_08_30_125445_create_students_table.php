<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->string('birthday');
            $table->string('grade');
            $table->string('section');
            $table->string('schoolyear');
            $table->string('contact');
            $table->string('fetcher');
            $table->string('guardian')->nullable();
            $table->string('guardian1')->nullable();
            $table->string('guardian2')->nullable();
            $table->string('status')->default('OUT');
            $table->string('time')->default('00:00');
            $table->string('color')->default('');
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
        Schema::dropIfExists('students');
    }
}
