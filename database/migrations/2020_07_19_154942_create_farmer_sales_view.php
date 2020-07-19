<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmerSalesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW farmer_sales AS
        SELECT 
            posts.id AS id,
            posts.user_id AS user_id,
            posts.crop_name AS crop_name,
            posts.created_at AS created_at,
            SUM(posts.fixed_quantity) AS totalFixedQty,
            SUM(posts.crop_quantity) AS totalAvailableQty,
            posts.earnings AS earnings,
            SUM(posts.kilogram_sold) AS totalKgSold,
            AVG(ROUND(posts.percentage_sold_before_harvest,
                    1)) AS totalPercentage
        FROM
            posts
        GROUP BY posts.user_id , posts.crop_name
        ");
    }

    /**
     * Reverse the migrations.

     * @return void
     */
    public function down()
    {

    }
}
