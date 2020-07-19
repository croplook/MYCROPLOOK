<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earnings', function (Blueprint $table) {
            $table->bigIncrements('earning_id');
            $table->integer('farmer_id');
            $table->integer('crop_id');
            $table->integer('buyer_id');  //customer id
            $table->double('kilogram_sold');
            $table->double('fixed_quantity');
            $table->double('earnings');
            $table->double('percentage_sold_before_harvest');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('earnings');
    }
}
