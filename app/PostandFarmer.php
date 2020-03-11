<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostandFarmer extends Model
{
        //table name
        protected $table = 'view_post';
        //primary key
        public $primaryKey = 'id';
        //timestamps
        public $timestamps = true;


    public function user(){
        return $this->belongsTo('App\User');
    }
}
