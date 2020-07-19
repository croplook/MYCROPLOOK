<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewUsersUserProfileView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW view_users_user_profile AS
        SELECT 
            users.register_as AS register_as,
            users.id AS id,
            users.mobilenumber AS mobilenumber,
            users.name AS name,
            users.email AS email,
            user_profile.user_profile_id AS user_profile_id,
            user_profile.first_name AS first_name,
            user_profile.middle_name AS middle_name,
            user_profile.last_name AS last_name,
            user_profile.birthday AS birthday,
            user_profile.mobile_no AS mobile_no,
            user_profile.email_add AS email_add,
            user_profile.company AS company,
            user_profile.job_title AS job_title,
            user_profile.user_image AS user_image,
            user_profile.user_id AS user_id
        FROM
            (users
            LEFT JOIN user_profile ON ((users.id = user_profile.user_id)))
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
