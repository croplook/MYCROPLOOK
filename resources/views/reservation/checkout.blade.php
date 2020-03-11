@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3" >
            <h1>Checkout</h1>
            <h4>Your Total: Php {{ $total }}</h4>
            <form action="{{route('checkout')}}" method="POST" id="checkout-form">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="o_name" value="{{Auth::user()->name}}" class="form-control" required name="o_name">
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Your Address:</label>
                        <input type="text" id="o_address" class="form-control" required name="o_address">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Your Contact Number:</label>
                        <input type="text" id="o_mobile_no" name="o_mobile_no" class="form-control" required>
                    </div>
                </div>
            </div>
            {{ csrf_field()}}
            <button class="btn btn-success">Buy Now</button>
            </form>
    </div>
</div>
@endsection
