@extends('layouts.app')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<div class="container">
    <h3>Products Statistics</h3>
    <div class="row ">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <div>Crops Statistics</div>
                <div class="card-body">

                         {!! $chart->container() !!}

                </div>
            </div>
        </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <div>Sales Statistics</div>
                    <div class="card-body">
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

{!! $chart->script() !!}
@endsection
