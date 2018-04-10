<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EIA Qualified Person') }}</title>

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
							
							<li class="dropdown">
                                <a style="color:black" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   <strong>SELF LEARNING</strong>
									<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li class="{{ Request::is('modules.index') ? "active" : "" }}"><a href="{{ route('modules.index') }}">Module 1</a></li>
                                    <li class="{{ Request::is('modules2.index') ? "active" : "" }}"><a href="{{ route('modules2.index') }}">Module 2</a></li>
                                    <li class="{{ Request::is('modules3.index') ? "active" : "" }}"><a href="{{ route('modules3.index') }}">Module 3</a></li>
                                    <li class="{{ Request::is('modules4.index') ? "active" : "" }}"><a href="{{ route('modules4.index') }}">Module 4</a></li>
                                    <li class="{{ Request::is('modules5.index') ? "active" : "" }}"><a href="{{ route('modules5.index') }}">Module 5</a></li>
                                    
                                    
                                </ul>
                            </li>
						
                        <li class="{{ Request::is('eiaprofiles.index') ? "active" : "" }}"><a href="{{ route('eiaprofiles.index') }}"><strong>PERSONAL PROFILE</strong></a></li>

                        <li class="{{ Request::is('') ? "active" : "" }}"><a href=""><strong>CONTINUOUS PROFESSIONAL DEVELOPMENT</strong></a></li>

                        <li class="{{ Request::is('eiacertrenew.index') ? "active" : "" }}"><a href=""><strong>CERTIFICATE RENEWAL</strong></a></li>

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
<div class="row">
        <div class="col-md-8 col-md-offset-2">
            
        </div>
        @yield('content')
    </div>
</div>

<footer class="container-fluid text-center">
  <label>Copyright © 2017 Jabatan Alam Sekitar</label>
</footer>


    <!-- Scripts -->
    <script src="/js/app.js"></script>

	 
	
</body>

</html>
