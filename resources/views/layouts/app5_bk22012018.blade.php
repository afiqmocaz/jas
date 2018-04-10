@extends('layouts.master')
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Jabatan Alam Sekitar</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="https://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" type="text/css" href="http://crs.doe.gov.my/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/justified-nav.css')!!}
    {!!Html::style('css/templatemo_style1.css')!!}
    {!!Html::style('css/parsley.css')!!}
     <style>

        

        </style>

     
      
    <script>
       
    </script>

    @yield('js')
    @section('content')
</head>
<div id="main_container">
 <div>
      <img src="{{URL::asset('/image/banner1.png')}}" alt="profile Pic" height="100" width="2048", class="img-responsive cleaner">
    </div>
        <div>
            
            <div class="navbar templatemo-nav" id="navbar">

                
            
                <div class="navbar-header">                 
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav nav-justified">
<!--                    <li><a href="{{ url('/sme') }}">HOME</a></li>
                    <li><a href="{{ url('/pcersme') }}">PCER</a></li>-->
                      <li><a href="{{ url('/secretariat_assigment/'.$category) }}">RUBRICS</a></li>
                       <li class="dropdown"><a class="dropbtn">PROFILE</a>
                     
                                 <div class="dropdown-content">
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> {{ Auth::user()->name }} <br>{{ Auth::user()->nric }} <br>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        </div>
                                    </li>
                      </ul>
                </div> <!-- nav -->
            </div>

           
                </div>

</div>
<div id="wrap">
    <div id="main" class="container clear-top">
    @yield('content')
    </div>
</div>
<footer class="footer">
            <div class="credit row">
                <center><div class="col-md-6 col-md-offset-3">
                    <div id="templatemo_footer">
                        Copyright © 2017 <a href="#">Jabatan Alam Sekitar</a>
                    </div>
                </div>
                        
            </div>
</footer>
</html>
@endsection