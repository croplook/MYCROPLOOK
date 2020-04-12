@extends('layouts.adminpanel')
@section('content')


<div class="container" style="padding-left: 250px;
padding-top: 20px;">
    <h3>Dashboard</h3>
     <a href="/explore-products/create" class="btn btn-primary" style="margin-bottom:1rem">Update Crop List</a><br>

     <a href="{{route('users.prod-stat')}}" class="btn btn-success" style="margin-bottom:1rem">Update Banners</a>

</div>

@endsection
