<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewUpUsersView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW view_up_users AS
        SELECT 
            users.id AS id,
            users.register_as AS register_as,
            users.mobilenumber AS mobilenumber,
            users.name AS name,
            users.email AS email,
            user_profile.user_image AS user_image
        FROM
            (users
            LEFT JOIN user_profile ON ((0 <> user_profile.user_id)))
        GROUP BY users.id
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
