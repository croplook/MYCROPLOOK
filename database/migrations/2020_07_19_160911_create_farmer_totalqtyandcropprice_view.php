<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmerTotalqtyandcroppriceView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW farmer_totalqtyandcropprice AS
            SELECT 
                posts.user_id AS user_id,
                SUM(posts.crop_quantity::decimal) AS sumCropQty,
                (SUM(posts.crop_quantity::decimal * posts.crop_price::decimal)) AS allCropPrice,
                AVG(posts.crop_price) AS avgCropPrice::decimal,
                posts.crop_name AS crop_name,
            FROM
                posts
            GROUP BY posts.user_id , posts.crop_name
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
