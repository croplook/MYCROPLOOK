<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom:2rem">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php $folderName = '/mycroplook/public' ?>

        <div class="navbar-nav" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                        <li class="nav-item active">
                        <a class="nav-link" href="<?php echo $folderName ?>/homepage">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $folderName ?>/explore-farms">EXPLORE FARMS</a>
                          </li>
                        <li class="nav-item">
                          <a class="nav-link" href="<?php echo $folderName ?>/explore-products">EXPLORE PRODUCTS</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="<?php echo $folderName ?>/products" style="margin-right:10rem">OFFERS</a>
                        </li>
            </ul>


            <!-- Right Side Of Navbar -->

                <!-- Authentication Links -->
                <ul class="navbar-nav mr-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('reservation.reservationCart')}}"><i class="fa fa-shopping-basket" aria-hidden="true"></i>  Reservations
                    <span class="badge bg-light text-black-50">
                        {{Session::has('reservation') ? Session::get('reservation')->totalQty : ''}}
                    </span>
                </a>
                </li>
                  <ul class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                    <i class="fa fa-user-o" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                    <li><a class="dropdown-item" href="/mycroplook/public/dashboard" >Dashboard</a> </li>
                    <li><a class="dropdown-item" href="{{ route('myaccount') }}"  >My Account</a> </li>
                    <li><a class="dropdown-item" href="{{ route('myorders') }}"  >My Orders</a> </li>
                    <hr>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>

                    </ul>

                @endguest

            </ul>
        </div>
    </div>
</nav>
