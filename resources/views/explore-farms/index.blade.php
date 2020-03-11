@extends('layouts.app')

@section('content')
    <h3>Explore Farms
    </h3>


    <div class="row ">

        @if(count($farms) > 0)
    @foreach($farms as $farm)
        <div class="col-sm-6 col-md-4 border-dark">
          <div class="thumbnail" style="margin:10px" >
            <img style="height: 200px; width: 100%" class="img-responsive" src="/mycroplook/storage/app/mycroplook/storage/app/public/landImage/{{$farm->land_image}}">
            <div class="caption">

            <h3><a href="/mycroplook/public/explore-farms/{{$farm->land_id}}" >{{$farm->name_of_company}}</a></h3>
                <h5>  {{$farm->land_address}}</h5>
              <div class="clearfix">
                <a href="/mycroplook/public/explore-farms/{{$farm->land_id}}" class="btn btn-success pull-right" role="button">More Info</a></p>
                </div>

            </div>

        </div>

        </div>
      @endforeach
      @else
        <p> No posts found </p>

      @endif
      </div>

      {{$farms->links()}}
@endsection
