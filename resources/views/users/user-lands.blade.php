@extends('layouts.app')

@section('content')


<div id="display_info" class="box box-white">
    <div class="box-header">
        <div class="row">
            <div class="col-6" style="vertical-align: bottom;">
                <h5 class="mt15 mb0">Land Address</h5>
            </div>
            <div class="col-6 align-right">
            <a href="{{route('users.addlands')}}" type="submit" type="button" id="notification_btn" class="btn btn-light" style="font-size: 14px;">
                    ADD NEW<div class="loader float-right ml15 info-loader" style="display: none;">
                </div></a>
            </div>
            <div class="col-12">
                <hr>
            </div>
        </div>
    </div>
    <div class="box-body">
        @if(count($user_profile) > 0)
        @foreach ($user_profile as $current_user)
        <img style="height: 200px; width: 50%;" class="img-responsive" src="/storage/uploads/landImage/{{$current_user->land_image}}">
        <h2>{{$current_user->name_of_company}}</h2>
        <p><strong>Land Address: </strong> {{$current_user->land_address}} </p>
        <p><strong>Land Area: </strong>{{$current_user->land_area}} </p>
        <p><strong>Land Elevation: </strong>{{$current_user->land_elevation}} </p>
        </p>

        @endforeach
        @else

        <p><strong>Land Address: </strong> <h2></h2></p>
        <p><strong>Land Area: </strong>  </p>
        <p><strong>Land Elevation: </strong></p>

        @endif
    </div>
</div>
@endsection
