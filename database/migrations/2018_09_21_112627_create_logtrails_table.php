<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogtrailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logtrails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fetcher');
            $table->string('status');
            $table->string('rfids');
            $table->string('time');
            $table->string('date');
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
        Schema::dropIfExists('logtrails');
    }
}
