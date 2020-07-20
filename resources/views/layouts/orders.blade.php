<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ secure_asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
            <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/myapp.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
        <link href="{{ asset('css/ordersconfirmation.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

    {{-- /* css view product start */ --}}
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha256-rByPlHULObEjJ6XQxW/flG2r+22R5dKiAoef+aXWfik=" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="/static/home_assets/css/clean-blog.css?nocache">
    <link rel="stylesheet" type="text/css" href="/static/home_assets/css/clean-blog.min.css?nocache">
    <link rel="stylesheet" type="text/css" href="/static/home_assets/css/custom.css?nocache">
    <link rel="stylesheet" type="text/css" href="/static/home_assets/css/custom-media.css?nocache">
    <!--<link rel="stylesheet" type="text/css" href="/static/css/custom.css?nocache" />-->
    <!--<link rel="stylesheet" type="text/css" href="/static/css/custom-media.css?nocache" />-->
    <link rel="stylesheet" type="text/css" href="/static/css/gen-media.css?nocache">
    <link rel="stylesheet" type="text/css" href="/static/css/gen-style.css?nocache">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" type="text/css" href="/static/plugins/FontAwesome/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="/static/home_assets/css/clean-blog.min.css" rel="stylesheet">

    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">

    <!--ion rangeSlider-->
    <link rel="stylesheet" href="/static/home_assets/plugins/ion.rangeSlider/css/ion.rangeSlider.min.css">

    <!--LightSlider-->
    <link rel="stylesheet" href="/static/plugins/lightslider/css/lightslider.min.css">

    <!--LightGallery-->
    <link rel="stylesheet" href="/static/plugins/lightgallery/css/lightgallery.min.css">

    {{-- /* end css view product */ --}}
    </head>

    <body>
    <!--////////////////TOP NAVBAR FIXED NAVBAR////////////////-->
    <div id="adminpanel">


    <main class="">
            @include('inc.navbar')
            <div class="container">
                @include('inc.messages')
              @yield('content')
            </div>
        </main>



</body>
</html>
