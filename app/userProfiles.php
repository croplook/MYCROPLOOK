<?php

namespace App;
use App\User;


use Illuminate\Database\Eloquent\Model;

class userProfiles extends Model
{
    //table name
    protected $table = 'user_profile';
    //primary key
    public $primaryKey = 'user_profile_id';
    //timestamps
    public $timestamps = true;


public function user(){
    return $this->belongsTo('App\User');
}
}
