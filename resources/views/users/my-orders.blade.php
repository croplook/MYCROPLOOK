@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md8 col-md-offset-2">
            <h2>My Orders</h2>
            @foreach ($orders as $order)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($order->orders_reservation->posts as $post)
                                <li class="list-group-item">
                                <span class="badge">Php {{$post['price']}}</span>
                                    {{$post['item']['crop_name']}} | {{$post['item']['0']}} Units
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-footer">
                    <strong> Total Price: Php {{$order->orders_reservation->totalPrice}}</strong>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection
