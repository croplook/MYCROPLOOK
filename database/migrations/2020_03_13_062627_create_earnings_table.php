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
            $table->string('kilogram_sold');
            $table->string('fixed_quantity');
            $table->string('earnings');
            $table->string('percentage_sold_before_harvest');
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
