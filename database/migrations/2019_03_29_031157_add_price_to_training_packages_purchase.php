<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceToTrainingPackagesPurchase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('training_package_purchases', function (Blueprint $table) {
        
            $table->unsignedBigInteger('price');
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

}
