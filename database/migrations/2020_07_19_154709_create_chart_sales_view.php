<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartSalesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        \DB::statement("
        CREATE VIEW chart_sales AS
        SELECT 
            posts.crop_name AS crop_name,
            SUM(posts.fixed_quantity::decimal) AS totalFixedQty,
            SUM(posts.crop_quantity::decimal) AS totalAvailableQty,
            posts.id AS id,
            posts.user_id AS user_id,
            posts.created_at AS created_at,
            posts.earnings AS earnings,
            SUM(posts.kilogram_sold::decimal) AS totalKgSold,
            AVG(ROUND(posts.percentage_sold_before_harvest::decimal,
                    1)) AS totalPercentage
        FROM
            posts
        GROUP BY posts.crop_name
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
