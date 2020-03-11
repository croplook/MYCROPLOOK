<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class farmProducts extends Model
{
  //table name
  protected $table = 'view_post';
  //primary key
  public $primaryKey = 'land_id';
  //timestamps
  public $timestamps = true;


  public function user(){
    return $this->belongsTo('App\User');
}
}
