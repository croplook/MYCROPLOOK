<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewUserLandsUserProfileView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW view_user_lands_user_profile AS
    SELECT 
        user_lands.user_id AS user_id,
        user_lands.name_of_company AS name_of_company,
        user_lands.land_address AS land_address,
        user_lands.land_area AS land_area,
        user_lands.land_elevation AS land_elevation,
        user_lands.land_image AS land_image,
        user_profile.first_name AS first_name,
        user_profile.middle_name AS middle_name,
        user_profile.last_name AS last_name,
        user_profile.user_image AS user_image,
        user_lands.land_id AS land_id
    FROM
        user_lands

        LEFT JOIN 
        user_profile ON user_lands.user_id = user_profile.user_id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { 
    }
}
