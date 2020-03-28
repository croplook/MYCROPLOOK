<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Earning;
use App\PostandFarmer;
use App\Order;
use App\Reservation;
use Session;

class ReservationController extends Controller
{
    public function startReservation(Request $request, $id){
        //dungagan pani diriii
        $post = Post::find($id);
        $oldReservation = Session::has('reservation') ? Session::get('reservation') : null;
        $reservation = new Reservation($oldReservation);
        $reservation->add($post, $post->id);

        //dd($reservation);
        $request->session()->put('reservation', $reservation);
        //dd($request->session()->get('reservation'));
        return redirect('/explore-products');

    }

    public function getReservations(){
        if (!Session::has('reservation')){
            return view('reservation.my-reservations');
        }
        $oldReservation = Session::get('reservation');
        $reservation = new Reservation($oldReservation);
        return view ('reservation.my-reservations', ['posts' => $reservation->posts, 'totalPrice' => $reservation->totalPrice]);

    }

    // public function getReservationsNavbar(){
    //     if (!Session::has('reservation')){
    //         return view('reservation.my-reservations');
    //     }
    //     $oldReservation = Session::get('reservation');
    //     $reservation = new Reservation($oldReservation);
    //     $posts = $reservation->posts;
    //     $totalPrice = $reservation->totalPrice;
    //     return $totalPrice;

    // }

    public function getReduceByOne($id){
        $oldReservation = Session::has('reservation') ? Session::get('reservation') : null;
        $reservation = new Reservation($oldReservation);
         $reservation->reduceByOne($id);

         if(count($reservation->posts) > 0){
            Session::put('reservation', $reservation);
        }else{
            Session::forget('reservation');
        }
         return redirect()->route('reservation.reservationCart');
    }

    public function getAddByOne($id){
        $oldReservation = Session::has('reservation') ? Session::get('reservation') : null;
        $reservation = new Reservation($oldReservation);
         $reservation->addByOne($id);

         if(count($reservation->posts) > 0){
            Session::put('reservation', $reservation);
        }else{
            Session::forget('reservation');
        }
         return redirect()->route('reservation.reservationCart');
    }

    public function getRemoveItem($id){
        $oldReservation = Session::has('reservation') ? Session::get('reservation') : null;
        $reservation = new Reservation($oldReservation);
        $reservation->removeItem($id);

        if(count($reservation->posts) > 0){
            Session::put('reservation', $reservation);
        }else{
            Session::forget('reservation');
        }

    return redirect()->route('reservation.reservationCart');

    }

    public function getCheckout(){
        if (!Session::has('reservation')){
            return view('reservation.my-reservations');
        }
        $oldReservation = Session::get('reservation');
        $reservation = new Reservation($oldReservation);

        $total = $reservation->totalPrice;
        return view('reservation.checkout', ['total' => $total]);


}
    public function postCheckout(Request $request){
            if (!Session::has('reservation')){
                return view('reservation.my-reservations');
            }
            if($this->productNoLongerAvailable()){
                return back()->with('error', 'Sorry, One of the Crops in your Cart is no Longer Available!');
            }

            $oldReservation = Session::get('reservation');
            $reservation = new Reservation($oldReservation);

            $order = new Order();
            $order->orders_reservation = serialize($reservation);
            $order->orders_buyer_name = $request->input('o_name');
            $order->orders_address = $request->input('o_address');
            $order->orders_mobile_no = $request->input('o_mobile_no');
            $order->orders_farmer_id = $request->input('o_mobile_no');

            foreach ($reservation->posts as $id=>$value){

            $product = Post::find($id);

            $old_quantity = (int) $product->crop_quantity;
            $kilo_sold = (int) $product->kilogram_sold;
            $less_quantity = (int) $value['qty'];
            $total_price = (int) $product->crop_price * $less_quantity;
            $sold = $less_quantity;
            $total = ($old_quantity - $less_quantity);

            $earning = new Earning();
            $earning->crop_id = $id;
            $earning->farmer_id = $product->user_id;
            $earning->buyer_id = Auth()->user()->id;
            $earning->kilogram_sold =  $sold;

            $earning->fixed_quantity = (int) $earning->kilogram_sold + $old_quantity;
            $earning->earnings = (int) $earning->earnings + $total;
            $earning->percentage_sold_before_harvest = (int) $earning->kilogram_sold + $sold / (int) $earning->fixed_quantity * 100;
            $earning->save();

            $product->update(['crop_quantity' => $total ]);

            $total_sold = $old_quantity + $sold;
            $product->update(['kilogram_sold' => $kilo_sold + $sold ]);
            $product->update(['fixed_quantity' => (int) $product->kilogram_sold + (int) $product->crop_quantity ]);
            $product->update(['earnings' => (int) $product->earnings + $total_price]);
            $product->update(['percentage_sold_before_harvest' => round((int) $product->kilogram_sold / $product->fixed_quantity * 100, 1)]);



            }

            Auth::user()->orders()->save($order);


            //pag minus sa quantity sa crops pag mag purchase
            //$this->decreaseQuantities();


            Session::forget('reservation');
            return redirect()->route('explore-products.index')->with('success', 'Successfully Purchased Crops!');
        }
        public function productNoLongerAvailable(){
            $oldReservation = Session::get('reservation');
            $reservation = new Reservation($oldReservation);

            foreach ($reservation->posts as $id=>$value){
                //dd($id);
                $product = Post::find($id);
                $old_quantity = (int) $product->crop_quantity;
                $less_quantity = (int) $value['qty'];

                if($old_quantity < $less_quantity){
                    return true;
                }

            }
            return false;
        }

            // $orders->transform(function($order, $key){
            //     $order->orders_reservation = unserialize($order->orders_reservation);
            // return $order;
            // });

            // foreach ($order as $post){
            //     $product = Post::find($post['item']);
            //      dd($post['item']);
            //     $product->update(['crop_quantity' -> $product->crop_quantity - $item->qty]);
            // }
            // $oldReservation = Session::get('reservation');
           // $reservation = new Reservation($oldReservation);
            //dd($reservation);
         //   foreach ($reservation as $post){
               // $product = Post::find($post[id]);
                //dd($post);
               // $product->update(['crop_quantity' -> $product->crop_quantity - $item->qty]);



        }


