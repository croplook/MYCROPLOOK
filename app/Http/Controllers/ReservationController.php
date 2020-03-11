<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
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

            $oldReservation = Session::get('reservation');
            $reservation = new Reservation($oldReservation);

            $order = new Order();
            $order->orders_reservation = serialize($reservation);
            $order->orders_buyer_name = $request->input('o_name');
            $order->orders_address = $request->input('o_address');
            $order->orders_mobile_no = $request->input('o_mobile_no');
            $order->orders_farmer_id = $request->input('o_mobile_no');

            Auth::user()->orders()->save($order);

            Session::forget('reservation');
            return redirect()->route('explore-products.index')->with('success', 'Successfully Purchased Crops!');
        }


}
