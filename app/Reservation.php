<?php

namespace App;

use App\Post;
use App\User;
use App\Order;

// mura syag shopping cart

class Reservation
{
        public $posts = null;
        public $totalQty = 0;
        public $totalPrice = 0;


        public function __construct($oldReservation)
        {
            if($oldReservation){
                $this->posts = $oldReservation->posts;
                $this->totalQty = $oldReservation->totalQty;
                $this->totalPrice = $oldReservation->totalPrice;
            }else{
                $this->posts = null;
            }


        }
        public function add($post, $id){
            $storedCrop = ['qty' => 0, 'price' => $post->crop_price, 'item' => $post];

        if ($this->posts){
            if(array_key_exists($id, $this->posts)){
                $storedCrop = $this->posts[$id];
            }
        }
        $storedCrop['qty']++;

        $storedCrop['price'] = $post->crop_price * $storedCrop['qty'];
        $this->posts[$id] = $storedCrop;
        $this->totalQty++;
        $this->totalPrice += $post->crop_price;
        }

        public function reduceByOne($id){
            $this->posts[$id]['qty']--;
            $this->posts[$id]['price'] -= $this->posts[$id]['item']['crop_price'];
            $this->totalQty--;
            $this->totalPrice -= $this->posts[$id]['item']['crop_price'];

            if($this->posts[$id]['qty']<=0){
                unset($this->posts[$id]);
            }
        }

        public function addByOne($id){
            $this->posts[$id]['qty']++;
            $this->posts[$id]['price'] += $this->posts[$id]['item']['crop_price'];
            $this->totalQty++;
            $this->totalPrice += $this->posts[$id]['item']['crop_price'];

            if($this->posts[$id]['qty']<=0){
                unset($this->posts[$id]);
            }
        }
        public function removeItem($id){
            $this->totalQty -= $this->posts[$id]['qty'];
            $this->totalPrice -= $this->posts[$id]['price'];

            unset($this->posts[$id]);
        }



        public function addFarmer($farmer, $id){
            $storedFarmer = ['farmer_info' => $farmer];
        if ($this->user){
            if(array_key_exists($id, $this->user)){
                $storedCrop = $this->user[$id];
            }
        }
        // $storedCrop['qty']++;

        // $storedCrop['price'] = $post->crop_price * $storedCrop['qty'];
        // $this->posts[$id] = $storedCrop;
        // $this->totalQty++;
        // $this->totalPrice += $post->crop_price;
        }

public function userReservations(){
    return $this->belongsTo('App\User');
}

}
