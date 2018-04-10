@extends('layouts.master2')
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">-->
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
@include('layouts.appsidebar')
        <title style="text-transform: uppercase">{{ config('app.name', $category.' Consultant') }}</title>
        <title style="text-transform: uppercase">{{ config('app.name', $category.' Consultant') }}</title>
        {!!Html::style('css/bootstrap.min.css')!!}
        {!!Html::style('css/select2.min.css')!!}
        {!!Html::style('css/justified-nav.css')!!}
        {!!Html::style('css/templatemo_style1.css')!!}
        {!!Html::style('css/parsley.css')!!}
        
        
        {!!Html::style('css/ionicons.min.css')!!}
        {!!Html::style('css/bootstrap.min.css')!!}
        {!! Html::script('js/jquery.min.js')!!}
        {!!Html::style('css/dataTables.min.css')!!}
        {!! Html::script('js/jquery.dataTables.min.js')!!}
        {!! Html::script('js/bootstrap.min.js')!!}

        


        @stack('extraStyles')


      

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <style type="text/css">

            footer {
                background-color: green;
                color: white;
                padding: 15px;
            }



        </style>
      
        
        <!-- Scripts -->
        <script>
            window.Laravel = <?php
echo json_encode([
    'csrfToken' => csrf_token(),
]);
?>
        </script>
    </head>
    @section('content')


     
            <div class="row">
               
                   

                        <div class=" container">
                           
 <center> <label id="demo" style=""></label></center>
                            <script>
                                // Set the date we're counting down to

                                var duedate2 = new Date("{{$payment->updated_at}}");
                               
                                var timerday2 = 180;
                                duedate2.setDate(duedate2.getDate() + timerday2);
                                var countDownDate = duedate2.getTime();

                                // Update the count down every 1 second
                                var x2 = setInterval(function () {

                                    // Get todays date and time
                                    var now2 = new Date().getTime();

                                    // Find the distance between now an the count down date
                                    var distance2 = countDownDate - now2;

                                    // Time calculations for days, hours, minutes and seconds
                                    var days2 = Math.floor(distance2 / (1000 * 60 * 60 * 24));
                                    var hours2 = Math.floor((distance2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    var minutes2 = Math.floor((distance2 % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds2 = Math.floor((distance2 % (1000 * 60)) / 1000);

                                    // Output the result in an element with id="demo"
                                    
                                    
                                    var table = "<table class='table table-bordered' style='width:80%'><tr><td class='alert-warning'><b>Time Remaining Validation (ID)</b></td><td width='20%'>"+days2+" days</td><td width='20%'>"+hours2+" hour</td><td width='20%'>"+minutes2+" minutes</td><td width='20%'>"+seconds2+" second</td></tr></table>";
                                    
                                     document.getElementById("demo").innerHTML = table;
                                    // If the count down is over, write some text 
                                    if (distance2 < 0) {
                                       $('#examContainer').html("<center><h1>Payment Validation Expired</h1></center>");
                                    }
                                }, 1000);
                            </script>

                </div>
               <div id='examContainer'>@yield('content')    </div>
            </div>
        </div>

        @stack('scripts');
        @if(App\Libs\Upload::$flag)
        {!! App\Libs\Upload::getInstance()->script() !!}
        @endif


       <!--  <footer class="container-fluid text-center">
            <label>Copyright © 2017 Jabatan Alam Sekitar</label>
        </footer> -->
@endsection


