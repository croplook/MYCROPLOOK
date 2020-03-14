<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BuyersofCrop;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('dashboard')
        ->with('buyers', $user->BuyersofCrop)
        ->with('posts', $user->posts);

}
}
