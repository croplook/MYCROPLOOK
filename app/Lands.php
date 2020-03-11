<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lands extends Model
{
  //table name
  protected $table = 'user_lands';
  //primary key
  public $primaryKey = 'land_id';
  //timestamps
  public $timestamps = true;


  public function user(){
    return $this->belongsTo('App\User');
}
}
