<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'APCS Consultant') }}</title>

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
            <div>
      <img src="{{URL::asset('/image/banner1.png')}}" alt="profile Pic" height="100" width="2048", class="img-responsive cleaner">
    </div>
          
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a style="color:blue"class="navbar-brand" href="{{ url('/') }}">
                       APCS Consultant
                    </a>
                    
                    
                    
                </div>

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
                                   <strong>SYLLABUS/REFERENCES</strong>
                                    <span class="caret"></span>
                                </a>
                                

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                            
                                        <a href="apcs_syllabus">
                                            <strong>SYLLABUS</strong>
                                        </a>  
                                    </li>
                                    <li>
                                        <a href="apcs_reference">
                                          <strong>  REFERENCES</strong>
                                        </a>  
                                    </li>
                                </ul>
                            </li>
                        
                        <li class="dropdown">
                        
                         <a style="color:black" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   <strong>COMPREHENSIVE EXAMINATION</strong>
                                    <span class="caret"></span>
                                </a>
                                
                               
                                <ul class="dropdown-menu" role="menu">
                                <li>
                            
                                        <a href="/examschedules/{{isset($category)?$category:"apcs"}}">
                                            <strong>MAIN COMPREHENSIVE EXAM</strong>
                                        </a>  
                                    </li>
                                    @if(!empty($useresult))
                                    @foreach($useresult as $useresult)
                                    @if($useresult->user_id == Auth::user()->id && $useresult->result <=79)
                                    <li>
                            
                                        <a href="apcs_repeatexam">
                                            <strong>REPEAT COMPEREHENSIVE EXAM</strong>
                                        </a>  
                                    </li>
                                      @endif
                                    @endforeach
                                    @endif
                                </ul>
                              
                            </li>
                        <li class="dropdown">
                                <a style="color:black" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  <strong>PCER</strong> 
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="apcs_pcer">
                                            <strong>PCER FORMAT</strong>
                                        </a>  
                                    </li>
                                    <li>
                                        <a href="apcsaddupload">
                                            <strong>ADDITIONAL INFO</strong>
                                        </a>  
                                    </li>
                                </ul>
                            </li>
                        </li>
                        <li><a href="apcs_iv"><strong>PROFESSIONAL INTERVIEW</strong></a></li>
                        
                        <li><a href="apcs_certificate"><strong>CERTIFICATION</strong></a></li>
                            
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
            <div class="panel panel-default"style="margin-left:8%;width:84%">
                
                <div class="panel-body">
                   <label style="margin-left:3%">Time Remaining:</label><label id="demo" style=""></label>

<script>
// Set the date we're counting down to

var duedate2 = new Date("{{Auth::user()->updated_at}}");
var timerday2 = 180;
duedate2.setDate(duedate2.getDate()+timerday2);
var countDownDate = duedate2.getTime();

// Update the count down every 1 second
var x2 = setInterval(function() {

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
    document.getElementById("demo").innerHTML = days2 + "d " + hours2 + "h "
    + minutes2 + "m " + seconds2 + "s ";
    
    // If the count down is over, write some text 
    if (distance2 < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>
                </div>
            </div>
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
