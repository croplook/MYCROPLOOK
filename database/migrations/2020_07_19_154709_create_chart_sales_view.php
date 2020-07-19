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
        CREATE VIEW chart_sales 
        AS
        SELECT DISTINCT ON (posts.crop_name)
            posts.id AS id,
            posts.user_id AS user_id,
            posts.crop_name AS crop_name,
            posts.created_at AS created_at,
            SUM(posts.fixed_quantity::decimal) AS totalFixedQty,
            SUM(posts.crop_quantity::decimal) AS totalAvailableQty,
            posts.earnings AS earnings,
            SUM(posts.kilogram_sold::decimal) AS totalKgSold,
            AVG(ROUND(posts.percentage_sold_before_harvest::decimal,
                    1)) AS totalPercentage
        FROM
            posts
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
