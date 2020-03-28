<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class farmerTotalQty extends Model
{
//table name
  protected $table = 'farmer_totalqtyandcropprice';
  //primary key
  public $primaryKey = 'id';
  //timestamps
  public $timestamps = true;


  public function user(){
    return $this->belongsTo('App\User');
}
}
