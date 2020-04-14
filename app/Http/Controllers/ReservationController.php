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
        return view('reservation.checkout', ['total' => $total, 'posts' => $reservation->posts]);


}
private static function smsgateway($phone, $message) {


    $array_fields['phone_number'] = $phone;

    $array_fields['message'] = $message;

    $array_fields['device_id'] = 116705;

    //$array_fields['device_id'] = 110460;

    $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU4Njg4ODI5MiwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjc5MzUxLCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.39zv2kxgafe6MjVor4UA-gjKYa8G_KihJTIxZOeiess";

//       $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU1MzY3OTM1MSwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjY5NTM0LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.jVJXqJFhLuAXP3Jgc4kIz1jteChBcgvVdORKK3mn9IQ";

    //$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU1Mzk2MTYzNywiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjYwOTQwLCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.Ci7Pt7jTerxqDco_9UcQFOfGmRYr3N4-gwXC-oIJPDc";


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://smsgateway.me/api/v4/message/send",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "[  " . json_encode($array_fields) . "]",
        CURLOPT_HTTPHEADER => array(
            "authorization: $token",
            "cache-control: no-cache"
        ),
    ));
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

//        if ($err) {
//            echo "cURL Error #:" . $err;
//        } else {
//            echo $response;
//        }


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

            ReservationController::smsgateway($request->input('o_mobile_no'),"You have Successfully Purchased a product.");

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


