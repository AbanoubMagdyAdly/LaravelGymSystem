<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingPackagesPurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_packages_purchase', function (Blueprint $table) {
            $table->bigInteger('id');

            $table->date('created_at');
            $table->unsignedBigInteger('trainee_id');
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('gym_id');
            $table->unsignedBigInteger('city_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_packages_purchase');
    }
}
