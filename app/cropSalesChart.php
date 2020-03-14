<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cropSalesChart extends Model
{
    //table name
    protected $table = 'chart_sales';
    //primary key
    public $primaryKey = 'id';
    //timestamps
    public $timestamps = true;


public function user(){
    return $this->belongsTo('App\User');
}
}

