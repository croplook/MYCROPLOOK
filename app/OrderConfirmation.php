<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderConfirmation extends Model
{
    //table name
    protected $table = 'confirm_orders';
    //primary key
    public $primaryKey = 'id';
    //timestamps
    public $timestamps = true;
  
  
    public function user(){
      return $this->belongsTo('App\User');
  }
  }
