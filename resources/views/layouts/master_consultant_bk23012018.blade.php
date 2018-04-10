@extends('layouts.master')
<html lang="en">
<head>
@include('layouts.apcscpd')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <title>{{$category}} - Qualified Person</title>
<!--<font style="text-transform: uppercase">{{$category}}</font>-->
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
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body style="background-color:white">

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
		
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <!-- Branding Image -->
                    <a style="color:blue"class="navbar-brand" href="{{ url('/') }}">
                       <font style="text-transform: uppercase">{{$category}}</font> - Qualified Person
                    </a>
					
					
					
               

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
							
                        @if($category === 'eia')
                        <li class="{{ Request::is('take_quiz_consultant/'.$category) ? "active" : "" }}"><a href="{{ url('take_quiz_consultant/eia') }}"><strong>SELF-LEARNING</strong></a></li>
                        @endif
                       <li class="{{ Request::is($category.'profiles/create') ? "active" : "" }}"><a href="{{ url($category.'profiles/create') }}"><strong>PERSONAL-PROFILE</strong></a></li>
<!--                       <li class="{{ Request::is('consultant_cpd/'.$category) ? "active" : "" }}"><a href="{{ url('consultant_cpd/'.$category) }}"><strong>CONTINUOUS PROFESSIONAL DEVELOPMENT</strong></a></li>-->
                         <li class="{{ Request::is('consultant_cert/'.$category) ? "active" : "" }}"><a href="{{ url('consultant_cert/'.$category) }}"><strong>CERTIFICATE RENEWAL</strong></a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <br>{{ Auth::user()->nric }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
         </div>
<div class="row">
    <div class="container"  style="width:40%;margin-left:28%">
       @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
       @endif
       @if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
       @endif
    </div>
        @yield('content')
    </div>
</div>

<footer class="container-fluid text-center">
  <label>Copyright © 2017 Jabatan Alam Sekitar</label>
</footer>


    <!-- Scripts -->
    <script src="/js/app.js"></script>

	 
	@endsection
</body>

</html>
