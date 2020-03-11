@extends('layouts.app')

@section('content')


        <div class="col-md-9">
            <div class="main-content">
                <div class="container">
                    <div class="form-row">
                        <div class="col-12">
                            <div id="display_info" class="box box-white">
                                <div class="box-header">
                                    <h5>Edit Profile</h5>
                                    <hr>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        @if(count($user_profile) > 0)
                                        @foreach ($user_profile as $current_user)
                                        {!! Form::open(['action' => ['MyAccountController@update', $current_user->user_profile_id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('firstName','First Name:')}}
                                                        <div class="col-15">
                                                            {{Form::text('firstName', $current_user->first_name, ['class' => 'form-control', 'placeholder' => 'First Name'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('middleName','Middle Name')}}
                                                        <div class="col-15">
                                                            {{Form::text('middleName', $current_user->middle_name, ['class' => 'form-control', 'placeholder' => 'Middle Name'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('lastName','Last Name')}}
                                                        <div class="col-15">
                                                            {{Form::text('lastName', $current_user->last_name, ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('mobileNumber','Mobile Number:')}}
                                                        <div class="col-15">
                                                            {{Form::text('mobileNumber', $current_user->mobile_no, ['class' => 'form-control', 'placeholder' => 'Mobile Number'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('emailAddress','Email Address')}}
                                                        <div class="col-15">
                                                            {{Form::text('emailAddress', $current_user->email_add, ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('birthday','Birthday')}}
                                                        <div class="col-15">
                                                            {{Form::date('birthday', $current_user->birthday, ['class' => 'form-control', 'placeholder' => 'Brithday'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('company','Company')}}
                                                        <div class="col-15">
                                                            {{Form::text('company', $current_user->company, ['class' => 'form-control', 'placeholder' => 'Company'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('jobTitle','Job Title')}}
                                                        <div class="col-15">
                                                            {{Form::text('jobTitle', $current_user->job_title, ['class' => 'form-control', 'placeholder' => 'Job Title'])}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <i class="fa fa-camera-retro fa-lg"></i>
                                                        {{Form::file('userImage')}}
                                                    </div>
                                                    {{Form::hidden('_method', 'PUT')}}

                                                    {{form::submit('Submit', ['class' => 'btn btn-primary'])}}

                                                @endforeach
                                                    @else

                                                {!! Form::open(['action' => 'MyAccountController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                    {{Form::label('firstName','First Name:')}}
                                                    <div class="col-15">
                                                        {{Form::text('firstName', '', ['class' => 'form-control', 'placeholder' => 'First Name'])}}
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                    {{Form::label('middleName','Middle Name')}}
                                                    <div class="col-15">
                                                        {{Form::text('middleName', '', ['class' => 'form-control', 'placeholder' => 'Middle Name'])}}
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                    {{Form::label('lastName','Last Name')}}
                                                    <div class="col-15">
                                                        {{Form::text('lastName', '', ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                    {{Form::label('mobileNumber','Mobile Number:')}}
                                                    <div class="col-15">
                                                        {{Form::text('mobileNumber', '', ['class' => 'form-control', 'placeholder' => 'Mobile Number'])}}
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                    {{Form::label('emailAddress','Email Address')}}
                                                    <div class="col-15">
                                                        {{Form::text('emailAddress', '', ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                    {{Form::label('birthday','Birthday')}}
                                                    <div class="col-15">
                                                        {{Form::date('birthday', '', ['class' => 'form-control', 'placeholder' => 'Brithday'])}}
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                    {{Form::label('company','Company')}}
                                                    <div class="col-15">
                                                        {{Form::text('company', '', ['class' => 'form-control', 'placeholder' => 'Company'])}}
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                    {{Form::label('jobTitle','Job Title')}}
                                                    <div class="col-15">
                                                        {{Form::text('jobTitle', '', ['class' => 'form-control', 'placeholder' => 'Job Title'])}}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <i class="fa fa-camera-retro fa-lg"></i>
                                                    {{Form::file('userImage')}}
                                                </div>
                                                {{form::submit('Submit', ['class' => 'btn btn-primary'])}}

                                                @endif
                                                {!! Form::close() !!}


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
        {{-- <div class="col-md-9">
            <div class="main-content">
                <div class="container">
                    <div class="form-row">
                        <div class="col-12">
                            <div id="display_info" class="box box-white">
                                <div class="box-header">
                                    <h5>Edit Profile</h5>
                                    <hr>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                            <div class="form-group row">
                                                <label for="first_name" class="col-3 col-form-label align-right">First Name:</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="first_name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="last_name" class="col-3 col-form-label align-right">Last Name:</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="last_name">
                                                </div>
                                            </div>
                                            <div class="form-group row mb5">
                                                    {{Form::label('birthday','Birthday:')}}
                                                    {{Form::date('cropHrvstPeriod', '', ['class' => 'form-control', 'placeholder' => 'Crop Harvest Period'])}}
                                            </div>
                                            <div class="form-group row">
                                                <span class="col-9 offset-3" style="font-size: 12px; color: #5C5C5C;">This is to verify that you are of legal age. We won’t share your birthday.</span>
                                            </div>
                                            <div class="form-group row mb5">
                                                <label for="email" class="col-3 col-form-label align-right">Email Address:</label>
                                                <ion-icon name="ios-lock" style="margin-top: 7px; margin-right: -10px; position: absolute; right: 0; z-index: 111; font-size: 20px; color: #A4A4A4" role="img" class="hydrated" aria-label="lock"></ion-icon>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <span class="col-9 offset-3" style="font-size: 12px; color: #5C5C5C;">We won’t share your email address.</span>
                                            </div>
                                            <div class="form-group row mb5">
                                                <label for="phone_number" class="col-3 col-form-label align-right">Phone Number:</label>
                                                <ion-icon name="ios-lock" style="margin-top: 7px; margin-right: -10px; position: absolute; right: 0; z-index: 111; font-size: 20px; color: #A4A4A4" role="img" class="hydrated" aria-label="lock"></ion-icon>
                                                <div class="col-9">
                                                    <input class="form-control" type="number" min="0" id="phone_number">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <span class="col-9 offset-3" style="font-size: 12px; color: #5C5C5C;">We won’t share your number.</span>
                                            </div>
                                            <div class="form-group row">
                                                <label for="company" class="col-3 col-form-label align-right">Company:</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="company">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="job_title" class="col-3 col-form-label align-right">Job Title</label>
                                                <div class="col-9">
                                                    <input class="form-control" type="text" id="job_title">
                                                </div>
                                            </div>
                                            <div class="form-group row mt50">
                                                <div class="col-12 align-self-md-stretch">
                                                    <button type="submit" class="btn btn-success">
                                                        SAVE <div class="loader float-right ml15 info-loader" style="display: none;"></div>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 mt10 mb30">
                                            <div class="change-avatar" style="background: url(/static/imgs/img-default.png)">
                                                <ul class="action-avatar">
                                                    <li class="action-item" onclick="changeAvatar()">
                                                        <i class="far fa-edit fa-fw"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <form id="save_avatar" method="POST" enctype="multipart/form-data" class="align-center">
                                                <input type="hidden" name="csrfmiddlewaretoken" value="mADSH2q1Np26YNIfZr767FFPh1VrHBXZaaISoYATeeZT8ooNqWbXoZaVjtOpLCh9">
                                                <input type="file" name="photo" accept="image/*" style="display: none">
                                                <div id="avatar_msg">
                                                </div>
                                                <button type="submit" id="avatar_btn" class="btn-main-invert" style="display: none; font-size: 14px;">
                                                    CHANGE PHOTO
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 --}}
