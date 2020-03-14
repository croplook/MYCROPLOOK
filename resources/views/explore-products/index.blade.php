@extends('layouts.app')

@section('content')
    <h3>Explore Products
    </h3>


    <div class="row ">
        @if(count($posts) > 0)
        @foreach($posts as $post)
        <div class="col-sm-6 col-md-4 border-dark">
          <div class="thumbnail" style="margin:10px" >
            <img style="height: 200px; width: 100%" class="img-responsive" src="/mycroplook/storage/app/mycroplook/storage/app/public/cropImage/{{$post->crop_image}}">
            <div class="caption">

                <h3><a href="/mycroplook/public/explore-products/{{$post->id}}" >{{$post->crop_name}}</a></h3>

                <h5> Posted on {{$post->created_at}} <br> Farmer: {{$post->user->name}}</h5>

                @if($post->crop_quantity >110)
                <span class="badge badge-success" style=" font-size: 15px;">In Stock</span><br>
                @elseif($post->crop_quantity < 110 && $post->crop_quantity >0)
                <span class="badge badge-warning" style=" font-size: 15px;">Low Stock</span><br>
                @else
                <span class="badge badge-danger" style=" font-size: 15px;">Not Available</span><br>
                @endif
              <div class="clearfix">
                  <div class="float-left price">₱ {{$post->crop_price}} /kg</div>
              <p>

                <a href="{{ route('reservation.startReservation', ['id' => $post->id]) }}" class="btn btn-success pull-right" role="button">Reserve Crop</a></p>
                </div>

            </div>

        </div>

        </div>
      @endforeach
      @else
        <p> No posts found </p>

      @endif
      </div>

      {{$posts->links()}}
@endsection
