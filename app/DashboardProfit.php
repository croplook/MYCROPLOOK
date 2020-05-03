<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DashboardProfit extends Model
{
    //table name
    protected $table = 'view_crop_profit';
    //primary key
    public $primaryKey = 'id';
    //timestamps
    public $timestamps = true;


public function user(){
    return $this->belongsTo('App\User');
}
}
