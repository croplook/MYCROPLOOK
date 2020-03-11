<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/myapp.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
</head>
<body>
    <div id="app">


        <main class="">
            @include('inc.navbar')
            <div class="container">
                @include('inc.messages')
              @yield('content')
            </div>
        </main>

    </div>

    <script>
        let myChart = document.getElementById('myChart').getContext('2d');

        // Global Options
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#777';

        let massPopChart = new Chart(myChart, {
          type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
          data:{
            labels:['Boston', 'Worcester', 'Springfield', 'Lowell', 'Cambridge', 'New Bedford'],
            datasets:[{
              label:'Population',
              data:[
                617594,
                181045,
                153060,
                106519,
                105162,
                95072
              ],
              //backgroundColor:'green',
              backgroundColor:[
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)',
                'rgba(255, 159, 64, 0.6)',
                'rgba(255, 99, 132, 0.6)'
              ],
              borderWidth:1,
              borderColor:'#777',
              hoverBorderWidth:3,
              hoverBorderColor:'#000'
            }]
          },
          options:{
            title:{
              display:true,
              text:'Largest Cities In Massachusetts',
              fontSize:25
            },
            legend:{
              display:true,
              position:'right',
              labels:{
                fontColor:'#000'
              }
            },
            layout:{
              padding:{
                left:50,
                right:0,
                bottom:0,
                top:0
              }
            },
            tooltips:{
              enabled:true
            }
          }
        });
      </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
