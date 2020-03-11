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

                                        {!! Form::open(['action' => 'MyLandsController@storelands', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('nameOfCompany','Name Of Company:')}}
                                                        <div class="col-15">
                                                            {{Form::text('nameOfCompany', '', ['class' => 'form-control', 'placeholder' => 'Name of Company'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('landAddress','Land Address')}}
                                                        <div class="col-15">
                                                            {{Form::text('landAddress','' , ['class' => 'form-control', 'placeholder' => 'Land Address'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('landArea','Land Area')}}
                                                        <div class="col-15">
                                                            {{Form::text('landArea','' , ['class' => 'form-control', 'placeholder' => 'Land Area'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('landElevation','Land Elevation')}}
                                                        <div class="col-15">
                                                            {{Form::text('landElevation','', ['class' => 'form-control', 'placeholder' => 'Land Elevation'])}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <i class="fa fa-camera-retro fa-lg"></i>
                                                        {{Form::file('landImage')}}
                                                    </div>
                                                    {{form::submit('Submit', ['class' => 'btn btn-primary'])}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
