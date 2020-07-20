
@extends('layouts.userProfile')
@extends('layouts.app')
@section('content')


	{{-- <div class="row">
		<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
    	 <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">

                    @if(count($user_profile) > 0)
                    @foreach ($user_profile as $current_user)
                    <img style="height: 200px; width: 200px; border-radius: 50%;" class="img-responsive" src="/storage/uploads/userImage/{{$current_user->user_image}}">
                    <h2>{{$current_user->first_name}} {{$current_user->middle_name}} {{$current_user->last_name}}</h2>
                    <p><strong>Birthday: </strong> {{$current_user->birthday}} </p>
                    <p><strong>Mobile Number: </strong>{{$current_user->mobile_no}} </p>
                    <p><strong>Email Address: </strong>{{$current_user->email_add}} </p>
                    <p><strong>Company: </strong> {{$current_user->company}}</p>
                    <p><strong>Job Title: </strong> {{$current_user->job_title}}</p>
                    </p>

                    @endforeach
                    @else

                    <p><strong>Full Name: </strong> <h2></h2>
                    <p><strong>Birthday: </strong>  </p>
                    <p><strong>Mobile Number: </strong></p>
                    <p><strong>Email Address: </strong> </p>
                    <p><strong>Company: </strong> </p>
                    <p><strong>Job Title: </strong> </p>
                    </p>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                        <img src="http://www.localcrimenews.com/wp-content/uploads/2013/07/default-user-icon-profile.png" alt="" class="img-circle img-responsive">
                        <figcaption class="ratings">
                            <p>Ratings
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                 <span class="fa fa-star-o"></span>
                            </a>
                            </p>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong> 20,7K </strong></h2>
                    <p><small>Followers</small></p>

                    <a href="{{ route('users.userlands')}}" class="btn btn-info btn-block" type="button"><span class="fa fa-user"></span> My Lands </a>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong>245</strong></h2>
                    <p><small>Following</small></p>

                    <a href="{{ route('users.createprofile')}}" class="btn btn-info btn-block" type="button"><span class="fa fa-user"></span> Edit Profile </a>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong>43</strong></h2>
                    <p><small>Snippets</small></p>
                    <div class="btn-group dropup btn-block">
                      <button type="button" class="btn btn-primary"><span class="fa fa-gear"></span> Options </button>
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu text-left" role="menu">
                        <li><a href="#"><span class="fa fa-envelope pull-right"></span> Send an email </a></li>
                        <li><a href="#"><span class="fa fa-list pull-right"></span> Add or remove from a list  </a></li>
                        <li class="divider"></li>
                        <li><a href="#"><span class="fa fa-warning pull-right"></span>Report this user for spam</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="btn disabled" role="button"> Unfollow </a></li>
                      </ul>
                    </div>
                </div>
            </div>
    	 </div>
        </div>


</div> --}}
<div class="container">
	<div class="row">
		<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
    	 <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    @if(count($user_profile) > 0)
                    @foreach ($user_profile as $current_user)
                    <h2>{{$current_user->first_name}} {{$current_user->middle_name}} {{$current_user->last_name}}</h2>
                    <p><strong>Birthday: </strong> {{$current_user->birthday}} </p>
                    <p><strong>Mobile Number: </strong>{{$current_user->mobile_no}} </p>
                    <p><strong>Email Address: </strong>{{$current_user->email_add}} </p>
                    <p><strong>Company: </strong> {{$current_user->company}}</p>
                    <p><strong>Job Title: </strong> {{$current_user->job_title}}</p>
                    </p>

                    @endforeach
                    @else

                    <p><strong>Full Name: </strong> <h2></h2>
                    <p><strong>Birthday: </strong>  </p>
                    <p><strong>Mobile Number: </strong></p>
                    <p><strong>Email Address: </strong> </p>
                    <p><strong>Company: </strong> </p>
                    <p><strong>Job Title: </strong> </p>
                    </p>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                        <img src="http://www.localcrimenews.com/wp-content/uploads/2013/07/default-user-icon-profile.png" alt="" class="img-circle img-responsive">
                        <figcaption class="ratings">
                            <p>Ratings
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                 <span class="fa fa-star-o"></span>
                            </a>
                            </p>
                        </figcaption>
                    </figure>
                    @if(count($user_profile) > 0)
                    @foreach ($user_profile as $current_user)
                    <img style="height: auto; width: 200px; border-radius: 50%;" class="img-responsive" src="/storage/uploads/userImage/{{$current_user->user_image}}">
                    @endforeach
                    @else

                    @endif
                </div>
            </div>
            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-4 emphasis">
                    <a href="{{ route('users.userlands')}}" class="btn btn-success btn-block" type="button"><i class="fa fa-leaf" aria-hidden="true"></i> My Lands </a>
                    {{-- <h2><strong> 20,7K </strong></h2>
                    <p><small>Followers</small></p>
                    <button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Follow </button> --}}
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <a href="{{ route('users.createprofile')}}" class="btn btn-info btn-block" type="button"><span class="fa fa-user"></span> Edit Profile </a>
                    {{-- <h2><strong>245</strong></h2>
                    <p><small>Following</small></p>
                    <button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile </button> --}}
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    {{-- <h2><strong>43</strong></h2>
                    <p><small>Snippets</small></p> --}}
                      <button type="button" class="btn btn-primary btn-block"><span class="fa fa-gear"></span> Options </button>
                      {{-- <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu text-left" role="menu">
                        <li><a href="#"><span class="fa fa-envelope pull-right"></span> Send an email </a></li>
                        <li><a href="#"><span class="fa fa-list pull-right"></span> Add or remove from a list  </a></li>
                        <li class="divider"></li>
                        <li><a href="#"><span class="fa fa-warning pull-right"></span>Report this user for spam</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="btn disabled" role="button"> Unfollow </a></li>
                      </ul> --}}
                </div>
            </div>
    	 </div>
		</div>
    </div>
</div>
@endsection
