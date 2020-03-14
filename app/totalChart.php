<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class totalChart extends Model
{
        //table name
        protected $table = 'chart_totalquantityandcropprice';
        //primary key
        public $primaryKey = 'id';
        //timestamps
        public $timestamps = true;


    public function user(){
        return $this->belongsTo('App\User');
    }
}
