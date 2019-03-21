<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoachesSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coaches_sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('gym_id');
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('coach_id');

//            $table->foreign('gym_id')->references('id')->on('gyms');
//            $table->foreign('session_id')->references('id')->on('training_session');
//            $table->foreign('coach_id')->references('id')->on('coaches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coaches_sessions');
    }
}
