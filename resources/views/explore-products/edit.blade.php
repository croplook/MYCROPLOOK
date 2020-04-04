@extends('layouts.app')

@section('content')

    <h3>Edit Post</h3>

    {!! Form::open(['action' => ['ExploreProductsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <input type="hidden" name="csrfmiddlewaretoken" value="5tnOuV4sJLpYrXUJBDNJ1yySmdZWs3CVs98OzkJ0UC1Pi31PYnTRED0uBHhjtns6">
    <input type="hidden" name="farm" value="2">
    <input type="hidden" name="form_type" value="insert">
    <div class="col-md-8 col-12">
        <div class="box box-white">
            <h5 class="box-header">Product Details</h5>
            <div class="box-body">
                <div class="form-row">
                    <div class="col-12">
                        <div class="form-group">
                            {{Form::label('cropName','Crop Name')}}
                            {{Form::select('cropName' , array('Carrots' => 'Carrots', 'Potatoes' => 'Potatoes','Coffee' => 'Coffee', 'Corn' => 'Corn',
                            'String Beans' => 'String Beans', 'Chinese Pechay' => 'Chinese Pechay', 'Banana' => 'Banana', 'Okra/Ladys Finger' => 'Okra/Ladys Finger'
                            , 'Cabbage' => 'Cabbage', 'Raddish' => 'Raddish', 'Bell Pepper' => 'Bell Pepper', 'Squash' => 'Squash', 'Sayote/Chayote' => 'Sayote/Chayote', 'Ampalaya/Bitter Gourd' => 'Ampalaya/Bitter Gourd'
                            , 'Eggplant' => 'Eggplant', 'Tomatoes' => 'Tomatoes', 'Onion' => 'Onion', 'Garlic' => 'Garlic'),
                            $post->crop_name, ['class' => 'form-control', 'placeholder' => ''])}}
                        </div>
                        <div class="form-group">

                            {{Form::label('cropDesc','Crop Description')}}
                            {{Form::textarea('cropDesc', $post->crop_desc, ['class' => 'form-control', 'placeholder' => 'Variety, Taste, Color, Size, Special Discounts'])}}

                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">

                             {{Form::label('cropPrice','Crop Price')}}
                            {{Form::text('cropPrice', $post->crop_price, ['class' => 'form-control', 'placeholder' => 'Crop Price'])}}

                            <small>* Price per selected metric (eg. Php 8/Kg).</small>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            {{-- {{Form::label('cropHrvstPeriod','Harvest Period')}}
                            {{Form::text('cropHrvstPeriod', '', ['class' => 'form-control', 'placeholder' => 'Harvest Period'])}} --}}
                            {{Form::label('cropStatus','Crop Status')}}
                            {{Form::select('cropStatus', array('Sprout' => 'Sprout', 'Seedling' => 'Seedling','Vegetative' => 'Vegetative', 'Budding' => 'Budding',
                                                'Flowering' => 'Flowering', 'Ripening' => 'Ripening'),
                                                $post->crop_status, ['class' => 'form-control', 'placeholder' => ''])}}
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">

                            {{Form::label('cropQuantity','Estimated Yield')}}
                            {{Form::text('cropQuantity', $post->crop_quantity, ['class' => 'form-control', 'placeholder' => 'Estimated Yield'])}}
                            <small>* Estimated yield per unit selected.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-white">
            <h5 class="box-header">Harvest Details</h5>
            <div class="box-body">
                <div class="form-row">

                    <div class="col-12 col-sm-4">

                        <div class="form-group">

                            {{Form::label('startHarvestMonth','Start of Harvest - Month')}}
                            {{Form::select('startHarvestMonth', array('Jan' => 'January', 'Feb' => 'February', 'Mar' => 'March', 'Apr' => 'April', 'May' => 'May',
                            'Jun' => 'June', 'Jul' => 'July', 'Aug' => 'August', 'Sep' => 'September', 'Oct' => 'October', 'Nov' => 'November', 'Dec' => 'December'),
                            $post->startHarvestMonth, ['class' => 'form-control', 'placeholder' => 'Select Month'])}}

                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            {{Form::label('startHarvestDay','Start of Harvest - Day')}}
                            {{Form::select('startHarvestDay', $days,
                            $post->startHarvestDay, ['class' => 'form-control', 'placeholder' => 'Select Day']) }}
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            {{Form::label('startHarvestYear','Start of Harvest - Year')}}
                            {{Form::select('startHarvestYear', array('2020' => '2020', '2021' => '2021', '2022' => '2022',
                            '2023' => '2023', '2024' => '2024','2025' => '2025'),
                            $post->startHarvestYear, ['class' => 'form-control', 'placeholder' => 'Select Year'])}}
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            {{Form::label('endHarvestMonth','End of Harvest - Month')}}
                            {{Form::select('endHarvestMonth', array('Jan' => 'January', 'Feb' => 'February', 'Mar' => 'March', 'Apr' => 'April', 'May' => 'May',
                            'Jun' => 'June', 'Jul' => 'July', 'Aug' => 'August', 'Sep' => 'September', 'Oct' => 'October', 'Nov' => 'November', 'Dec' => 'December'),
                            $post->endHarvestMonth, ['class' => 'form-control', 'placeholder' => 'Select Month'])}}

                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            {{Form::label('endHarvestDay','End of Harvest - Day')}}
                            {{Form::select('endHarvestDay', $days,
                            $post->endHarvestDay, ['class' => 'form-control', 'placeholder' => 'Select Day'])}}

                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            {{Form::label('endHarvestYear','End of Harvest - Year')}}
                            {{Form::select('endHarvestYear', array('2020' => '2020', '2021' => '2021', '2022' => '2022',
                            '2023' => '2023', '2024' => '2024','2025' => '2025'),
                            $post->endHarvestYear, ['class' => 'form-control', 'placeholder' => 'Select Year'])}}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="col-md-4 col-12">
        <div class="box box-white">
            <h5 class="box-header">Images</h5>


            <div class="row">


                <div class="col-12 col-sm-6">
                    <div class="form-group">

                        <i class="fa fa-camera-retro fa-lg"></i>  {{Form::file('cropImage')}}

                    </div>
                </div>

                <div class="col-12 text-right">
                    {{Form::hidden('_method', 'PUT')}}
                    {{form::submit('Submit', ['class' => 'btn btn-primary'])}}

                    {!! Form::close() !!}
                </div>
            </div>
            </div>
        </div>



    </div>

</form>

<div class="form-group">

</div>
<div class="form-group">

</div>
<div class="form-group">

</div>
<div class="form-group">

</div>
<div class="form-group">
</div>

<div class="form-group">
</div>
<div class="form-group">

</div>


@endsection
