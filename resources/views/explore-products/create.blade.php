@extends('layouts.app')

@section('content')



    <h3>Create Post</h3>

    {!! Form::open(['action' => 'ExploreProductsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
        {{Form::label('cropName','Crop Name')}}
        {{Form::text('cropName', '', ['class' => 'form-control', 'placeholder' => 'Crop Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('cropPrice','Crop Price')}}
        {{Form::text('cropPrice', '', ['class' => 'form-control', 'placeholder' => 'Crop Price'])}}
    </div>
    <div class="form-group">
        {{Form::label('cropQuantity','Crop Quantity')}}
        {{Form::text('cropQuantity', '', ['class' => 'form-control', 'placeholder' => 'Crop Quantity'])}}
    </div>
    <div class="form-group">
      {{Form::label('cropStatus','Crop Status')}}
      {{Form::text('cropStatus', '', ['class' => 'form-control', 'placeholder' => 'Crop Status'])}}
    </div>
    <div class="form-group">
        {{Form::label('cropDesc','Crop Description')}}
        {{Form::textarea('cropDesc', '', ['class' => 'form-control', 'placeholder' => 'Variety, Taste, Color, Size, Special Discounts'])}}
      </div>

      <div class="form-group">
        {{Form::label('cropHrvstPeriod','Crop Harvest Period')}}
        {{Form::date('cropHrvstPeriod', '', ['class' => 'form-control', 'placeholder' => 'Crop Harvest Period'])}}
      </div>
      <div class="form-group">
        <i class="fa fa-camera-retro fa-lg"></i>  {{Form::file('cropImage')}}
      </div>
    {{form::submit('Submit', ['class' => 'btn btn-primary'])}}

{!! Form::close() !!}
@endsection
