@extends('layouts.orders')

@section('content')
<div>
     <h4><strong>MY ORDERS</strong></h4><hr>
     <strong>PENDING ORDERS</strong>
      <div id="ordersbtn">
            <a href="{{route('dashboard.CompletedTransaction')}}" class="btn btn-success" style="margin-bottom:1rem">Completed transactions</a>
            <a href="{{route('users.orders-dashboard')}}" class="btn btn-info" style="margin-bottom:1rem">Cancelled Orders</a>
      </div>
            <div class="container-fluid px-5 py-5 mx-auto">
                <div class="row  px-3">
        @if(count($orders_to_confirm) == 0)
            @foreach ($orders_to_confirm as $order_item)
              @if($order_item->status == "isPending")
                    <div class="block text-center"> <img class="image" src="/storage/uploads/cropImage/{{$order_item->crop_image}}">
                        <div class="info py-2 px-2">
                          <div class="row px-3">
                            
                                <a class="mb-0 lg-font btn cancelledorder" type="button" href="{{route('myaccount.CancelledOrder', ['canc_id'=> $order_item->io_id])}}">CANCEL ORDER</a>
                             
                              </div>
                            <div class="text-left">
                              <h5 class="mb-0 mt-2">{{$order_item->crop_name}}</h5>
                              <small class="text-muted mb-1">Crop Price: ₱ {{$order_item->crop_price}} /kg</small><br>
                              <small class="text-muted mb-1">Quantity Ordered: {{$order_item->qty}} kg</small><br>
                              <small class="text-muted mb-1">Total price: ₱ {{$order_item->price}} </small>
                            <hr>
                            
                            @foreach ($farmers_info as $farmer_info)
                            @if($farmer_info->id == $order_item->user_id)
                            <h6 class="mb-0 mt-2">Buyers Info:</h6>
                            <small class="text-muted mb-1"> Farmer's Name: {{$farmer_info->first_name}} {{$farmer_info->middle_name}} {{$farmer_info->last_name}} </small><br>
                            <small class="text-muted mb-1"> Company Name: {{$farmer_info->name_of_company}} </small><br>
                            <small class="text-muted mb-1"> Mobile Number: {{$farmer_info->mobile_no}}</small><br>

                            @else
                            @endif
                            @endforeach
                            </div>
                          </div>
                        </div>
              @endif
            @endforeach
          @else
            <p>You have no pending orders yet.</p>
          @endif
                      </div>
                    </div>
<div class="panel panel-default panel-order">
              <div class="panel-heading">
              <h5><strong>LIST OF CONFIRMED ORDERS</strong></h5>
                  <div class="btn-group pull-right">
                      <div class="btn-group">
                            <button type="button" class=" btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                              Filter Reservations <i class="fa fa-filter"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="#">Approved orders</a></li>
                              <li><a href="#">Pending orders</a></li>
                            </ul>
                        </div>
                  </div>
            </div>
            <hr>



            <div class="container-fluid px-5 py-5 mx-auto">
                <div class="row  px-3">
                
            @foreach ($orders_to_confirm as $order_item)
            @if($order_item->status == "isConfirmed")
                    <div class="block text-center"> <img class="image" src="/storage/uploads/cropImage/{{$order_item->crop_image}}">
                        <div class="info py-2 px-2">
                          <div class="row px-3">
                            
                                <a class="btn btnrec cart3" type="button" href="{{route('dashboard.DeliveredOrder', ['deli_id'=> $order_item->io_id])}}">CONTACT FARMER</a>
                            
                              </div>
                              <div class="text-left">
                              <h5 class="mb-0 mt-2">{{$order_item->crop_name}}</h5>
                              <small class="text-muted mb-1">Crop Price: ₱ {{$order_item->crop_price}} /kg</small><br>
                              <small class="text-muted mb-1">Quantity Ordered: {{$order_item->qty}} kg</small><br>
                              <small class="text-muted mb-1">Total price: ₱ {{$order_item->price}} </small>
                            <hr>
                            
                            @foreach ($farmers_info as $farmer_info)
                            @if($order_item->user_id == $farmer_info->id)
                            <h6 class="mb-0 mt-2">Buyers Info:</h6>
                            <small class="text-muted mb-1"> Farmer's Name: {{$farmer_info->first_name}} {{$farmer_info->middle_name}} {{$farmer_info->last_name}} </small><br>
                            <small class="text-muted mb-1"> Company Name: {{$farmer_info->name_of_company}} </small><br>
                            <small class="text-muted mb-1"> Mobile Number: {{$farmer_info->mobile_no}}</small><br>

                            @else
                            @endif
                            @endforeach
                            </div>
                          </div>
                        </div>
                        @endif
                        @endforeach
                      </div>
                    </div>
</div>


<div class="panel panel-default panel-order">
              <div class="panel-heading">
              <h5><strong>LIST OF DELIVERED ORDERS</strong></h5>
                  <div class="btn-group pull-right">
                      <div class="btn-group">
                            <button type="button" class=" btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                              Filter Reservations <i class="fa fa-filter"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="#">Approved orders</a></li>
                              <li><a href="#">Pending orders</a></li>
                            </ul>
                        </div>
                  </div>
            </div>
            <hr>



            <div class="container-fluid px-5 py-5 mx-auto">
                <div class="row  px-3">
                
            @foreach ($orders_to_confirm as $order_item)
            @if($order_item->status == "isDelivered")
                    <div class="block text-center"> <img class="image" src="/storage/uploads/cropImage/{{$order_item->crop_image}}">
                        <div class="info py-2 px-2">
                          <div class="row px-3">
                            
                                <a class="btn btnrec cart4" type="button" href="{{route('dashboard.DeliveredOrder', ['deli_id'=> $order_item->io_id])}}">REPORT</a>
                                <a class="btn order3" type="button" href="{{route('dashboard.DeliveredOrder', ['deli_id'=> $order_item->io_id])}}">RECEIVED</a>
                            
                              </div>
                              <div class="text-left">
                              <h5 class="mb-0 mt-2">{{$order_item->crop_name}}</h5>
                              <small class="text-muted mb-1">Crop Price: ₱ {{$order_item->crop_price}} /kg</small><br>
                              <small class="text-muted mb-1">Quantity Ordered: {{$order_item->qty}} kg</small><br>
                              <small class="text-muted mb-1">Total price: ₱ {{$order_item->price}} </small>
                            <hr>
                            
                            @foreach ($farmers_info as $farmer_info)
                            @if($order_item->user_id == $farmer_info->id)
                            <h6 class="mb-0 mt-2">Buyers Info:</h6>
                            <small class="text-muted mb-1"> Farmer's Name: {{$farmer_info->first_name}} {{$farmer_info->middle_name}} {{$farmer_info->last_name}} </small><br>
                            <small class="text-muted mb-1"> Company Name: {{$farmer_info->name_of_company}} </small><br>
                            <small class="text-muted mb-1"> Mobile Number: {{$farmer_info->mobile_no}}</small><br>

                            @else
                            @endif
                            @endforeach
                            </div>
                          </div>
                        </div>
                        @endif
                        @endforeach
                      </div>
                    </div>
</div>


</div>

@endsection
