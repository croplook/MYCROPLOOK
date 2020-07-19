<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewUserProfilePostsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW `view_user_profile_posts` AS
        SELECT 
            `posts`.`user_id` AS `post_id`,
            `posts`.`id` AS `id`,
            `user_profile`.`user_profile_id` AS `user_profile_id`,
            `user_profile`.`first_name` AS `first_name`,
            `user_profile`.`middle_name` AS `middle_name`,
            `user_profile`.`last_name` AS `last_name`,
            `user_profile`.`birthday` AS `birthday`,
            `user_profile`.`mobile_no` AS `mobile_no`,
            `user_profile`.`email_add` AS `email_add`,
            `user_profile`.`company` AS `company`,
            `user_profile`.`job_title` AS `job_title`,
            `user_profile`.`user_image` AS `user_image`,
            `user_profile`.`user_id` AS `up_id`
        FROM
            (`posts`
            LEFT JOIN `user_profile` ON ((`posts`.`user_id` = `user_profile`.`user_id`)))
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
