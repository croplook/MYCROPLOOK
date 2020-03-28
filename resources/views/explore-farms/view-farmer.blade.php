@extends('layouts.app')

@section('content')

<section class="body-content">

    <div class="container pb20">
        <div class="mb20 farm-container">
            <div class="col-12 p0 img img10 m15" style=" background-image:url('/static/home_assets/img/bg-explore-farms.png');">
                <img style=" display:block; width:100%; height: 350px;" src="/storage/uploads/landImage/{{$farm->land_image}}">


                <div class="align-right" style="position:absolute; top:10%; right:3%; width:100%;">
                    <button class="icons-align btn-toggle active">
                        <ion-icon class="icons-color active hydrated" name="heart" role="img" aria-label="heart"></ion-icon>
                        &nbsp;<span class="hide-on-xs">SAVE</span>
                    </button>
                    <button class="icons-align btn-toggle">
                        <ion-icon name="notifications" class="icons-color hydrated" role="img" aria-label="notifications"></ion-icon>
                        &nbsp;<span class="hide-on-xs">TURN ON NOTIFICATION</span>
                    </button>
                </div>
            </div>
            <div class="row mlr0 mt15">
                <div class="col-12 col-lg-8">
                    <div class="row pl0">
                        <div class="col-12">
                            <span class="title-lg">{{$farm->name_of_company}}</span>
                        </div>
                        <div class="col-12">
                            <span class="text-sub">
                                {{$farm->land_address}}
                            </span>
                        </div>


                    </div>
                    <div class="row pl0 mt30">

                        <div class="col-12 info-text text-justify">
                            Farm Area: {{$farm->land_area}} <br>
                            Farm Elevation: {{$farm->land_elevation}}<br>
                        </div>
                    </div>
                    <div class="row mlr0 mtb5">
                        <a href="#" class="read-more">READ MORE</a>
                    </div>
                    <div class="row mlr0 mt20">
                        <div class="col-12 plr0">
                            <span class="title-md">Shipping</span>
                        </div>
                        <div class="col-12 plr0 info-text text-justify">
                            Shipping fees are not included. <br>
                            The following options are available:
                        </div>
                    </div>
                    <div class="row mlr0 mt20">
                        <div class="col-12 plr0">
                            <span class="title-md">Cancellation Policy</span>
                        </div>
                        <div class="col-12 plr0 info-text text-justify">
                            Request a cancellation within: 2 hours of purchase. <span>
                            Strictly no cancellation permitted when harvest period begins.
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div>
                        <div class="card align-items-center border-none">
                            <div class="mt20">

                                <img style="background:#4B524E; width:100px; height:100px; border-radius:58.5px;" src="/storage/uploads/userImage/{{$farm->user_image}}">
                            </div>
                            <div class="card-body pt15 pb0">
                                <h5 class="mb0">{{$farm->first_name}} {{$farm->middle_name}} {{$farm->last_name}}</h5>
                                <ul class="info-address pt0 align-center">
                                    <li class="info-item">
                                        <span>GROWER</span>
                                    </li>
                                </ul>
                            <div class="pr0">
                                <button class="btn-main-solid btn-farm-size">SEND MESSAGE</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div>
{{-- active products section --}}

                    @foreach ($farm_products as $farmproduct)
                        <div class="row mt30">
                            <div class="col-12 align-left">
                                <h6> Active Products</h6>
                            </div>
                        </div>

                        <div class="row mr0">
                            <div class="col-6 pr0 mt20 products-similar">
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="card border-none">

                                            {{-- pahelp kay mark hahahaha --}}
                                            <a href="/explore-products">
                                                <img class="card-img-top" src="/storage/uploads/cropImage/{{$farmproduct->crop_image}}" alt="Explore Image">
                                                <div class="card-img-overlay overlay d-flex flex-column p0 tag-img">
                                                    <!-- <p class="card-tag-solid text-lato-bold">In Season</p> -->
                                                </div>
                                                <div class="card-body p0 mt10 info-text-sm">
                                                <span class="text-lato-bold mb0">{{$farmproduct->crop_name}}</span><br>
                                                    <span class="">{{$farmproduct->crop_price}}</span><br>
                                                    <span class="product-sm-info mt0">Harvest Period: {{$farmproduct->harvest_period}}</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        <div class="row mt10">
                            <div class="col-12 align-right">
                                <a href="#" class="read-more mr0">
                                    <ion-item>
                                        View Archived Listings<ion-icon name="ios-arrow-forward" class="q-icon read-more-arrow-sm hydrated" role="img" aria-label="arrow forward"></ion-icon>
                                    </ion-item>
                                </a>
                            </div>
                        </div>
                        <div class="row mt20">
                            <button class="btn-main-solid btn-farm-size-full">SEND ORDER REQUEST</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mtb20 info-text">
                <div class="col-12">
                    <h5> Related Growers </h5>
                    <div class="row">

                        <div class="col-12 col-xs-6 col-md-6 col-lg-3 products-similar">
                            <div class="row">
                                <div class="plr15">
                                    <div class="card m15 border-none">
                                        <a href="/farm/view-grower/">
                                            <img class="card-img-top" src="/static/home_assets/img/season-vege.png" alt="Explore Image">
                                            <!-- <div class="img img100" style="width:255px;background-image:url('../../../media/images/season-vege@2x.png');"></div> -->
                                            <div class="card-body p0">
                                                <ul class="info-address">
                                                    <li class="info-item">
                                                        <span>Banaue</span>
                                                    </li>
                                                    <li class="info-item">
                                                        <span>Ifugao</span>
                                                    </li>
                                                </ul>
                                                <h6 class="info-title">John's Natural Farm</h6>
                                                <ul class="info-subtitle">
                                                    <li class="info-item">
                                                        <span>Carrots</span>
                                                    </li>
                                                    <li class="info-item">
                                                        <span>Eggplant</span>
                                                    </li>
                                                    <li class="info-item">
                                                        <span>Squash</span>
                                                    </li>
                                                </ul>
                                                <div class="form-row mt10">
                                                    <div class="col-7 col-md-6 col-lg-12 col-xl-7 ">
                                                    <!-- <div class="col-7"> -->
                                                        <div class="star-rating">
                                                            <span style="width:100%"></span>
                                                        </div>
                                                        <span class="farm-text">1.2k</span>
                                                    </div>
                                                    <div class="col-5 col-md-6 col-lg-12 col-xl-5 farm-rating-area text-right text-lg-left text-xl-right">
                                                    <!-- <div class="col-5"> -->
                                                        <ul class="info-farm-type">
                                                            <li class="info-item farm-text">
                                                                <span>Superhost</span>
                                                            </li>
                                                            <li class="info-item">
                                                                <img src="/static/home_assets/img/icon-verified.png">
                                                            </li>
                                                            <li class="info-item">
                                                                <img src="/static/home_assets/img/icon-secure.png">
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </section>
    @endsection
