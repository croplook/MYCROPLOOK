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
                    <div>Profitability Statistics</div>
                    <div class="card-body">
                        <div class="container">
                                <div class="row">
                                    <div class="col-md-6"><b>Crop</b></div>
                                    {{-- <div class="col-md-3"><b>Prod. Cost</b></div>
                                    <div class="col-md-3"><b>Earnings</b></div> --}}
                                    <div class="col-md-6"><b>Profit</b></div>
                                    @foreach($profits as $profit)
                                    <div class="col-md-6">{{$profit->crop_name}}</div>
                                    {{-- <div class="col-md-3">{{$profit->production_cost}}</div>
                                    <div class="col-md-3">{{$profit->earnings}}</div> --}}
                                    <div class="col-md-6">{{$profit->crop_profitability}}</div>
                                    @endforeach
                                  </div>
                            </div>
            </div>
        </div>
    </div>
    </div>
</div>

{!! $chart->script() !!}
@endsection
