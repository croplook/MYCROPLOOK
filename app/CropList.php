<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CropList extends Model
{
    //table name
  protected $table = 'croplist';
  //primary key
  public $primaryKey = 'id';
  //timestamps
  public $timestamps = true;


  public function user(){
    return $this->belongsTo('App\User');
}
}
