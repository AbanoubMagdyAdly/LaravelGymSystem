<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendance_users', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('session_id')->references('id')->on('training_session');
            $table->foreign('gym_id')->references('id')->on('gyms');
            $table->foreign('city_id')->references('id')->on('cities');
        });
        Schema::table('training_session', function (Blueprint $table) {

            $table->foreign('gym_id')->references('id')->on('gyms');

        });
        Schema::table('gyms', function (Blueprint $table) {

        $table->foreign('manager_id')->references('id')->on('users');
        $table->foreign('session_id')->references('id')->on('training_session');
        $table->foreign('city_id')->references('id')->on('cities');
        });
        Schema::table('coaches_sessions', function (Blueprint $table) {

            $table->foreign('gym_id')->references('id')->on('gyms');
            $table->foreign('session_id')->references('id')->on('training_session');
            $table->foreign('coach_id')->references('id')->on('coaches');
        });
        Schema::table('training_packages_purchase', function (Blueprint $table) {

            $table->foreign('trainee_id')->references('id')->on('trainee');
            $table->foreign('package_id')->references('id')->on('training_packages');

            $table->foreign('gym_id')->references('id')->on('gyms');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
