<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTraineeTokenColoumnToTraineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD
//        Schema::table('trainees', function (Blueprint $table) {
//            $table->text('trainee_token')->default(null);
//
//        });
=======
        // Schema::table('trainees', function (Blueprint $table) {
        //     $table->text('trainee_token')->default(null);

        // });
>>>>>>> 81ff8fa9d1297b0a29f1da8e5bf1e1a55501c3ac
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trainees', function (Blueprint $table) {
            //
        });
    }
}
