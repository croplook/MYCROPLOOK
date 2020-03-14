@extends('layouts.app')

@section('content')
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <body>
<div class="jumbotron text-center" >
    <h1>Welcome to CropLook!</h1>
    <h5 >Barangay Kapatagan Agricultural Trading Portal with Real-Time SMS Notification for Crop-Growth Monitoring</h5>
   </div>
<div class="row">
       <h4>Crop Statistics</h4>
   <div class="flex">
       <div class="w 1/2">
    {!! $chart->container() !!}
    </div>
   </div>
</div>
   <div class="row">
       <div class="col-md-6 col-sm-6">
            <h2>Explore Products</h2>
        </div>
        <div class="col-md-6 col-sm-6">
            <a class="a-see-all" href="/mycroplook/public/explore-products">See all</a>
        </div>
    </div>

   <div class="card-deck">
        @if(count($posts) > 0)
        @foreach($posts as $post)

        <div class="card">
            <img style="height: 200px;" class="img-responsive" src="/mycroplook/storage/app/mycroplook/storage/app/public/cropImage/{{$post->crop_image}}">
            <div class="card-body">
                <h3 class="card-title"><a href="/mycroplook/public/explore-products/{{$post->id}}" >{{$post->crop_name}}</a></h3>
                <h5 class="card-text"> {{$post->crop_desc}}</h5>
                <button type="button" class="btn btn-success btn-card-view">view</button>
            </div>
        </div>

    @endforeach
    @else
    <p> No posts found </p>

    @endif
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6">
             <h2>Explore Farms</h2>
         </div>
         <div class="col-md-6 col-sm-6">
             <a class="a-see-all" href="/mycroplook/public/explore-farms">See all</a>
         </div>
     </div>

    <div class="card-deck">
         @if(count($user_lands) > 0)
         @foreach($user_lands as $user_land)

         <div class="card">
             <img style="height: 200px;" class="img-responsive" src="/mycroplook/storage/app/mycroplook/storage/app/public/landImage/{{$user_land->land_image}}">
             <div class="card-body">
                 <h3 class="card-title">{{$user_land->name_of_company}}</h3>
                 <h5 class="card-text"> {{$user_land->land_address}}</h5>
                 <h5 class="card-text"> {{$user_land->land_area}}</h5>
                 <button type="button" class="btn btn-success btn-card-view">more info</button>
             </div>
         </div>

     @endforeach
     @else
     <p> No posts found </p>

     @endif
     </div>
     {!! $chart->script() !!}


  </body>
@endsection
