@extends('layouts.app')

@section('content')

    <h3>Edit Post</h3>

    {!! Form::open(['action' => ['ExploreProductsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
        {{Form::label('cropName','Crop Name')}}
        {{Form::text('cropName', $post->crop_name, ['class' => 'form-control', 'placeholder' => 'Crop Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('cropPrice','Crop Price')}}
        {{Form::text('cropPrice',  $post->crop_price, ['class' => 'form-control', 'placeholder' => 'Crop Price'])}}
    </div>
    <div class="form-group">
        {{Form::label('cropQuantity','Crop Quantity')}}
        {{Form::text('cropQuantity', $post->crop_quantity, ['class' => 'form-control', 'placeholder' => 'Crop Quantity'])}}
    </div>
    <div class="form-group">
      {{Form::label('cropStatus','Crop Status')}}
      {{Form::text('cropStatus',  $post->crop_status, ['class' => 'form-control', 'placeholder' => 'Crop Status'])}}
    </div>
    <div class="form-group">
        {{Form::label('cropDesc','Crop Description')}}
        {{Form::textarea('cropDesc',  $post->crop_desc, ['class' => 'form-control', 'placeholder' => 'Variety, Taste, Color, Size, Special Discounts'])}}
      </div>

      <div class="form-group">
        {{Form::label('cropHrvstPeriod','Crop Harvest Period')}}
        {{Form::date('cropHrvstPeriod',  $post->crop_harvestPeriod, ['class' => 'form-control', 'placeholder' => 'Crop Harvest Period'])}}
      </div>
      <div class="form-group">
        <i class="fa fa-camera-retro fa-lg"></i> {{Form::file('cropImage')}}
    </div>
      {{Form::hidden('_method', 'PUT')}}
    {{form::submit('Submit', ['class' => 'btn btn-primary'])}}

{!! Form::close() !!}
@endsection
