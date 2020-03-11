@extends('layouts.app')

@section('content')

    <h2> {{$title}} </h2>
    @if(count($products) > 0)
        <ul class="list-group">
        @foreach ($products as $product)
            <li class="list-group-item">{{$product}}</li>
        @endforeach
        </ul>
    @endif

@endsection
