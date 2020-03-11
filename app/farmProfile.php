<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class farmProfile extends Model
{
  //table name
  protected $table = 'view_user_lands_user_profile';
  //primary key
  public $primaryKey = 'land_id';
  //timestamps
  public $timestamps = true;


  public function user(){
    return $this->belongsTo('App\User');
}
}
