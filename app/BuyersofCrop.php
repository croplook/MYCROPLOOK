<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyersofCrop extends Model
{
  //table name
  protected $table = 'view_buyers_crops';
  //primary key
  public $primaryKey = 'user_id';
  //timestamps
  public $timestamps = true;


  public function user(){
    return $this->belongsTo('App\User');
}
}
