<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\userProfile;
use App\Post;
use App\postsUP;
use App\User;
use App\Lands;
use App\Reservation;
use App\userProfiles;
use App\Order;
use App\IndividualOrder;
use Gate;

class MyAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $current_user_id = auth()->user()->id;
        $user_profile = userProfiles::where('user_id', $current_user_id)->get();
        return view('users.user-profile')->with('user_profile', $user_profile);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createprofile()
    {
        $current_user_id = auth()->user()->id;
        $user_profile = userProfiles::where('user_id', $current_user_id)->get();
        return view('users.create-profile')->with('user_profile', $user_profile);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            {
                //
                $this->validate($request, [
                    'firstName' => 'required',
                    'middleName'=> 'required',
                    'lastName' => 'required',
                    'birthday'=> 'required',
                    'mobileNumber' => 'required',
                    'emailAddress' => 'required',
                    'userImage' => 'Image|nullable'

                ]);

                //handle file upload

                if($request->hasFile('userImage')){
                    //get the filename with the extension
                    $filenameWithExt = $request->file('userImage')->getClientOriginalName();
                    //get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    //get just extension
                    $extension= $request->file('userImage')->getClientOriginalExtension();
                    $filenameToStore = $filename.'_'.time().'.'.$extension;
                    // upload image
                    $path = $request->file('userImage')->storeAs('public/uploads/userImage/', $filenameToStore);

                } else{
                    $filenameToStore = 'no-image.jpg';
                }

                //create user
                $user_profile = new userProfiles;
                $user_profile->first_name = $request->input('firstName');
                $user_profile->middle_name = $request->input('middleName');
                $user_profile->last_name = $request->input('lastName');
                $user_profile->birthday = $request->input('birthday');
                $user_profile->mobile_no = $request->input('mobileNumber');
                $user_profile->email_add = $request->input('emailAddress');
                $user_profile->company = $request->input('company');
                $user_profile->job_title = $request->input('jobTitle');
                $user_profile->user_id = auth()->user()->id;
                $user_profile->user_image = $filenameToStore;

                $user_image = User::find(auth()->user()->id);
                $user_image->user_image = $filenameToStore;
                $user_image->save();

                $user_profile->save();


                return redirect('explore-products')->with('success', 'User Profile Created!');

            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_profile_id)
    {
        {
            //
            //handle file upload
            if($request->hasFile('userImage')){
                //get the filename with the extension
                $filenameWithExt = $request->file('userImage')->getClientOriginalName();
                //get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //get just extension
                $extension= $request->file('userImage')->getClientOriginalExtension();
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                // upload image
                $path = $request->file('userImage')->storeAs('public/uploads/userImage/', $filenameToStore);

            }else
            {
                $filenameToStore = "no-image.jpg";
            }

            $this->validate($request, [
                'firstName' => 'required',
                'middleName'=> 'required',
                'lastName' => 'required',
                'birthday'=> 'required',
                'mobileNumber' => 'required',
                'emailAddress' => 'required',
                'userImage' => 'Image|nullable'

            ]);

            //update user
                $user_profile = userProfiles::find($user_profile_id);
                $user_profile->first_name = $request->input('firstName');
                $user_profile->middle_name = $request->input('middleName');
                $user_profile->last_name = $request->input('lastName');
                $user_profile->birthday = $request->input('birthday');
                $user_profile->mobile_no = $request->input('mobileNumber');
                $user_profile->email_add = $request->input('emailAddress');
                $user_profile->company = $request->input('company');
                $user_profile->job_title = $request->input('jobTitle');
                $user_profile->user_id = auth()->user()->id;
                if($request->hasFile('userImage')){
                $user_profile->user_image = $filenameToStore;
                $user_image->user_image = $filenameToStore;
                }

                $user_image->save();
                $user_profile->save();

            return redirect('explore-products')->with('success', 'User Profile Updated!');

        }
    }

//////////////// my orders naaaa ///////////////////////////
public function myOrders()
{
    if(!Gate::allows('isBuyer')){
        abort(404, 'Sorry, the page you are looking for could not be found');
    }
    $orders = Auth::user()->orders;
    $orders->transform(function($order, $key){
        $order->orders_reservation = unserialize($order->orders_reservation);
        return $order;
    });
    $current_user_id = auth()->user()->id;
    $orders_to_confirm = IndividualOrder::where('buyers_id', $current_user_id)->get();


    $fs_info = postsUP::groupBy('id')->get();
    $user_profile = userProfiles::where('user_id', $current_user_id)->get();
    return view('users.my-orders', ['orders'=> $orders])
    ->with('farmers_info', $fs_info)
    ->with('orders_to_confirm', $orders_to_confirm);

}

public function getUserInvoice($orders_id)
{
    if(!Gate::allows('isBuyer')){
        abort(404, 'Sorry, the page you are looking for could not be found');
    }

    $postInfo = Post::find($orders_id);
    $postId = $postInfo->id;
    $farmerInfo = postsUP::where('user_id', $postInfo->user_id)->groupBy('id')->get();
    $orders = Auth::user()->orders;
    $orders->transform(function($order, $key){
        $order->orders_reservation = unserialize($order->orders_reservation);
        return $order;
    });
    $current_user_id = auth()->user()->id;
    $fs_info = postsUP::groupBy('id')->get();
    $user_profile = userProfiles::where('user_id', $current_user_id)->get();
    return view('users.user-invoice', ['orders'=> $orders])
    ->with('farmerInfo', $farmerInfo)
    ->with('postInfo', $postInfo)
    ->with('postId', $postId)
    ->with('user_profile', $user_profile);
}
public function messages(){
    return view('/chat');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
