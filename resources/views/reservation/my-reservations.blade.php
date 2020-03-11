@extends('layouts.app')

@section('content')
@if(Session::has('reservation'))
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <ul class="list-group ">
                @foreach($posts as $post)
                <li class="list-group-item">
                <strong>{{ $post['item']['crop_name']}}</strong>
                <strong>{{ $post['item']['farmer'] }}</strong>
                <span class="label label-success">{{$post['price']}}</span>
                <div class="btn-group">
                    <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action<span class="tab-content"></span></button>
                    <ul class="dropdown-menu">
                    <li><a href="{{ route('reservation.reduceByOne', ['id' => $post['item']['id']])}}">Reduce by 1</a></li>
                        <li><a href="{{ route('reservation.removeItem', ['id' => $post['item']['id']])}}">Remove Crop</a></li>
                    </ul>
                </div>

                <span class="badge bg-dark text-white">{{ $post['qty']}}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <strong>Total: {{ $totalPrice }}</strong>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <a href="{{ route('checkout')}}" type="button" class="btn btn-success">Checkout</a>
        </div>
    </div>
@else
<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
    <h2>No Reservations!</h2>
    </div>
</div>
@endif
@endsection
