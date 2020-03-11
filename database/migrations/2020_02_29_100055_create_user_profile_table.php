<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function (Blueprint $table) {
            $table->bigIncrements('user_profile_id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('birthday');
            $table->string('mobile_no');
            $table->string('email_add');
            $table->string('company');
            $table->string('job_title');
            $table->string('user_image');
            $table->string('user_id');
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
        Schema::dropIfExists('user_profile');
    }
}
