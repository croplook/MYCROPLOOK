@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-6 col-md-8 col-md-offset-8 col-sm-offset-3" >
                     <div class="items">

                        @foreach($posts as $post)
                         <div class="product">
                             <div class="row">
                                 <div class="col-md-3">
                                     <img class="img-fluid mx-auto d-block image" src="storage/uploads/cropImage/{{$post['item']['crop_image']}}" >
                                 </div>
                                 <div class="col-md-8">
                                     <div class="info">
                                         <div class="row">
                                             <div class="col-md-8 product-name">
                                                 <div class="product-name">
                                                     <h5><strong><a href="#">{{ $post['item']['crop_name']}}</a></strong></h5>
                                                     <div class="product-info">
                                                         <div><strong>Price: </strong><span class="value">₱ {{ $post['item']['crop_price'] }} /kg</span></div>
                                                         <div><strong>Description: </strong><span class="value">{{ $post['item']['crop_desc'] }}</span></div>
                                                        <div><strong>Harvest Period: </strong><span class="value">{{ $post['item']['startHarvestMonth'] }} {{ $post['item']['startHarvestYear'] }} - {{ $post['item']['endHarvestMonth'] }} {{ $post['item']['endHarvestYear'] }}</span></div><div><strong>Description: </strong><span class="value">{{ $post['item']['crop_desc'] }}</span></div>
                                                        {{-- <div><strong>Grower: </strong><span class="value">{{$post->user->name}}</span></div> --}}
                                                        <div><strong>Total Quantity: </strong><span class="value">{{ $post['qty'] }} kg</span></div>


                                                        <hr>
                                                        <div><strong>Total Price: </strong><span class="value">₱ {{ $post['price'] }}</span></div>

                                                     </div>
                                                 </div>
                                             </div>

                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <hr>
                         @endforeach
                     </div>
                 </div>


<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3" >
    <h2>Checkout</h2><hr>

    <h5>Your Total Bill: ₱ {{ $total }}</h5><hr>
    <form action="{{route('checkout')}}" method="POST" id="checkout-form">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">

                <label for="name">Full Name:</label>
                <input type="text" id="o_name" value="{{Auth::user()->name}}" class="form-control" required name="o_name">
            </div>

        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Your Address:</label>
                <input type="text" id="o_address" class="form-control" required name="o_address">
                <small>* To place order, please add a delivery address.</small><br>
                <small> *          Bldg or Street/Brgy/City/Region/Province/Postal code.</small>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Your Contact Number:</label>
                <input type="text" id="o_mobile_no" name="o_mobile_no" class="form-control" value="+63" required>
                <small>* Please use +63</small>
            </div>
        </div>
    </div>
    {{ csrf_field()}}
    <button class="btn btn-success">Place Order</button>
    </form>
</div>
</div>
@endsection
