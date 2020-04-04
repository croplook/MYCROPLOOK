@extends('layouts.app')

@section('content')

<div class="panel panel-default panel-order">
    <div class="panel-heading">
        <strong>Lists of Orders</strong>
        <div class="btn-group pull-right">
            <div class="btn-group">
              <button type="button" class=" btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                Filter history <i class="fa fa-filter"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="#">Approved orders</a></li>
                <li><a href="#">Pending orders</a></li>
              </ul>
            </div>
          </div>
    </div>
    <hr>

  <div class="panel-body">


            @foreach ($orders as $order)
                @foreach($order->orders_reservation->posts as $post)
                @if($post['item']['user_id'] == $current_user_id)
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-1"><img src="/storage/uploads/cropImage/{{$post['item']['crop_image']}}" style="height: 50px; width: 100px;" class="img-responsive img-thumbnail"></div>
              <span><strong>{{$post['item']['crop_name']}}</strong></span><br>
              <span> Crop Price: ₱ {{$post['item']['crop_price']}} /kg</span><br>
              <span> Quantity Ordered: {{$post['qty']}} kg</span><br><hr>
              <span> Total price: ₱ {{$post['price']}} </span><br>
              <hr>
              <span><strong>Buyers Info:</strong></span><br>
              <span> Buyer's Full Name: {{$order->orders_buyer_name}} </span><br>
              <span> Buyer's Address: {{$order->orders_address}} </span><br>
              <span> Buyer's Mobile Number: {{$order->orders_mobile_no}} </span><br>
              <hr>
                <span><strong>Order Status: </strong></span><span></span>
              <br><a data-placement="top" class="btn btn-success btn-md" href="#" title="View Order"><i class="fa fa-eye" aria-hidden="true"></i></a>
              <a data-placement="top" class="btn btn-danger  btn-md" href="#" title="Cancel Order"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <div class="pull right">
                </div>
              {{-- <a data-placement="top" class="btn btn-info  btn-xs glyphicon glyphicon-usd" href="#" title="Danger"></a> --}}
            </div>
            <div class="col-md-12">
              Order made on: {{$order->created_at}}
            </div>
          </div>
                @endif
                @endforeach
          @endforeach

@endsection
