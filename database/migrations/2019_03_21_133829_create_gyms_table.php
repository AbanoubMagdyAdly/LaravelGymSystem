<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGymsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gyms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('image', 100);
            $table->date('created_at');
            $table->unsignedBigInteger('manager_id');
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('city_id');

//            $table->foreign('manager_id')->references('id')->on('users');
//            $table->foreign('session_id')->references('id')->on('training_session');
//            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gyms');
    }
}
