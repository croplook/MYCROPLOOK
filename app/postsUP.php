<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postsUP extends Model
{
        //table name
        protected $table = 'view_users_posts_up_ul';
        //primary key
        public $primaryKey = 'post_id';
        //timestamps
        public $timestamps = true;

public function user(){
    return $this->belongsTo('App\User');
}
}

