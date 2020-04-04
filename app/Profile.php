<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
        //table name
        protected $table = 'view_up_users';
        //primary key
        public $primaryKey = 'id';
        //timestamps
        public $timestamps = true;


    public function user(){
        return $this->belongsTo('App\User');
    }
}
