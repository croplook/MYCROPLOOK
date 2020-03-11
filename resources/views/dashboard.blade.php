@extends('layouts.app')

@section('content')

<?php $folderName = '/mycroplook/public' ?>
<div class="container">
    <div class="card-header">Dashboard</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        <a href="<?php echo $folderName ?>/explore-products/create" class="btn btn-primary" style="margin-bottom:1rem">Create Post</a>
        <h3> Your Posts</h3>
        @if(count($posts) > 0)
        <table class="table table-striped">
        <tr>
         <th>CROP NAME</th>
         <th></th>
         <th></th>
        </tr>
        @foreach($posts as $post)
        <tr>
        <th>{{$post->crop_name}}</th>
        <td><a href="<?php echo $folderName ?>/explore-products/{{$post->id}}/edit" class="btn btn-default bg-light">Edit</a></td>
        <td>
                                {!!Form::open(['action' => ['ExploreProductsController@destroy', $post->id], 'method' =>'POST'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                        <p>You have no Posts yet</p>
                    @endif
                </div>
</div>
@endsection
