<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_session', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->time('start_time');
            $table->time('finish_time');
            $table->date('date_of_session');

            $table->unsignedBigInteger('gym_id');

//            $table->foreign('gym_id')->references('id')->on('gym');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_session');
    }
}
