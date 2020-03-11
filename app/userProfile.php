<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class userProfile extends Model
{
    //table name
    protected $table = 'view_users_user_profile';
    //primary key
    public $primaryKey = 'id';
    //timestamps
    public $timestamps = true;


public function user(){
    return $this->belongsTo('App\User');
}
}
