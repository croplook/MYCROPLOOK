<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BuyersofCrop;
use App\Charts\prodChart;
use App\cropSalesChart;
use App\farmerTotalQty;
use App\farmerChart;
use Charts;

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
public function prodStat()
{
    $user_id = auth()->user()->id;
    $user = User::find($user_id);

    //Crop Availability
    $totalQty = farmerTotalQty::where('user_id', $user_id)
    ->pluck('sumCropQty','crop_name');

    //Crop Sales Kilogram
    $salesKg = farmerChart::where('user_id', $user_id)
    ->pluck('totalKgSold','crop_name');

    //Crops Fixed Quantity
    $salesFixedQuantity = farmerChart::where('user_id', $user_id)
    ->pluck('totalFixedQty','crop_name');


    $chart = new prodChart;
    $chart->labels($totalQty->keys())->options([
        'legend' => [
            'display' => true,
            'position' => 'top',
            'fullWidth' => true,
            'align' => 'start'
            ]
        ]);
    $chart->dataset('Crop Availability', 'bar', $totalQty->values())
    ->backgroundColor('green');
    // $chart->dataset('Crops Average Price', 'line', $totalPrice->values())
    // ->backgroundColor('grey');
    $chart->dataset('Crops Fixed Quantity', 'bubble', $salesFixedQuantity->values())
    ->backgroundColor('red');
    $chart->dataset('Crop Sales Kilogram', 'line', $salesKg->values())
    ->backgroundColor('grey');


    return view('users/prod-statistics')
    ->with('buyers', $user->BuyersofCrop)
    ->with('chart', $chart)
    ->with('posts', $user->posts);
}
}
