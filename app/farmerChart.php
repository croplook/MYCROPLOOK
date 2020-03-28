<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class farmerChart extends Model
{
  //table name
  protected $table = 'farmer_sales';
  //primary key
  public $primaryKey = 'id';
  //timestamps
  public $timestamps = true;


  public function user(){
    return $this->belongsTo('App\User');
}
}
