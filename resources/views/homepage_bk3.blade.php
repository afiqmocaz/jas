<!DOCTYPE html>
<html lang="en">
<head>
  <title>Homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {!!Html::style('css/bootstrap.min.css')!!}
        {!!Html::style('css/select2.min.css')!!}
        {!!Html::style('css/justified-nav.css')!!}
        {!!Html::style('css/templatemo_style1.css')!!}
        {!!Html::style('css/parsley.css')!!}
        {!!Html::style('css/ionicons.min.css')!!}
     
        {!! Html::script('js/jquery.min.js')!!}
        {!!Html::style('css/dataTables.min.css')!!}
        {!! Html::script('js/jquery.dataTables.min.js')!!}
        {!! Html::script('js/bootstrap.min.js')!!}
         {!!Html::style('css/button.css')!!}
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
 
<!--include jQuery Validation Plugin-->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js" type="text/javascript"></script>
 
<!--Optional: include only if you are using the extra rules in additional-methods.js -->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/additional-methods.min.js" type="text/javascript"></script>




  <style>
    f1 {
      font-size: 10px;
    }

    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
    }
    p {
      text-align: justify;
    }
    .table th, .table td {
      border-top: none !important;
      border-left: none !important;
    }
    h4 {
      font-size: 20;
    }
   
    .credit {
  padding: 10px 0px;
  background-color: #006e00;
  }
  footer a {
    color: #FFFFFF;
  }
  footer {
    color: #FFFFFF;
    width:100%;
  height:5%;   
  position:absolute;
  bottom:0;
  left:0;
  background-color:green;
  }
  .col-xs-12 {
    width: 0%;
  }
  .col-sm-10 {
    background-color: white;
  }
  .col-xs-3 {
    background-color: white;
  }


.div-center {
  width: 400px;
  height: 35 0px;
  background-color: rgba(245, 245, 245, 0.4);;
  position: absolute;
  left: 0;
  right: 0;
  top: 100px;
  bottom: 0;
  margin: auto;
  max-width: 100%;
  max-height: 100%;
  overflow: auto;
  padding: 1em 2em;
  border-bottom: 2px solid #ccc;
  display: table;
}

div.content {
  display: table-cell;
  vertical-align: middle;
}
#p.container {  
  background:none;  
}
.tab-content{
  background:none; 
}
body, html {
    height: 100%;
}

.bg { 
    /* The image used */
    background-image: url("gambar.jpg");

    /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.navbar-brand {
  padding: 0px;
  width:100px;
}
.navbar-brand>img {
  height: 100%;
  padding: 15px;
  width: 85px;
}
.example2 .navbar-brand>img {
  padding: 7px 14px;
}
.navbar .nav > li > a, .navbar .nav > li > a:first-letter,
.navbar .nav > li.current-menu-item > a, 
.navbar .nav > li.current-menu-ancestor > a {

color:          black;                        
font-family:    bodoni;
 font-weight: bold;
}

body
{
  font-family: Arial, Sans-serif;
}
.error
{
color:red;
font-family:verdana, Helvetica;
}
  </style>
  <script type="text/javascript">$(function(){
    $('.button-checkbox').each(function(){
    var $widget = $(this),
      $button = $widget.find('button'),
      $checkbox = $widget.find('input:checkbox'),
      color = $button.data('color'),
      settings = {
          on: {
            icon: 'glyphicon glyphicon-check'
          },
          off: {
            icon: 'glyphicon glyphicon-unchecked'
          }
      };

    $button.on('click', function () {
      $checkbox.prop('checked', !$checkbox.is(':checked'));
      $checkbox.triggerHandler('change');
      updateDisplay();
    });

    $checkbox.on('change', function () {
      updateDisplay();
    });

    function updateDisplay() {
      var isChecked = $checkbox.is(':checked');
      // Set the button's state
      $button.data('state', (isChecked) ? "on" : "off");

      // Set the button's icon
      $button.find('.state-icon')
        .removeClass()
        .addClass('state-icon ' + settings[$button.data('state')].icon);

      // Update the button's color
      if (isChecked) {
        $button
          .removeClass('btn-default')
          .addClass('btn-' + color + ' active');
      }
      else
      {
        $button
          .removeClass('btn-' + color + ' active')
          .addClass('btn-default');
      }
    }
    function init() {
      updateDisplay();
      // Inject the icon if applicable
      if ($button.find('.state-icon').length == 0) {
        $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
      }
    }
    init();
  });
});</script>
  </head>

  <body class="bg">
  <!-- HEADER -->
    <div class="row">
    <div>
      

    </div>
    </div>
  <!-- HEADER -->

<div class="row example2">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" ><img src="jata.png" alt="Dispute Bills" hspace="20" width="20%">
        </a>
        <a class="navbar-brand" ><img src="logo.jpg" alt="Dispute Bills" hspace="20">
        </a>
        <h4 class="navbar-text text-uppercase" style="font-family:bodoni; color:black"><b>Consultant Registration Scheme</b></h4>
      </div>
      <div id="navbar2" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="#">HOME</a></li>
          <li><a href="#">INFO</a></li>
          <li><a href="#">GUIDELINE</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">ANNOUNCEMENT <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li class="divider"></li>
              <li class="dropdown-header">Nav header</li>
              <li><a href="#">Separated link</a></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>
</div>
    <!-- SLIDER -->
    <div id="p" class="container">

    <br>

    <!-- TABS -->

    <!-- TABS -->



       <div class="back">


  <div class="div-center">


    <div class="content">


        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}" name="myemailform" id="myemailform">
            {{ csrf_field() }}
        <div class="form-group">
        <center><h2>Please Sign In</h2> </center>
        <hr class="colorgraph">
           <div class="{{ $errors->has('nric') ? ' has-error' : '' }}">
              
                
                    
                  <input  type="text" class="form-control" userid="userid" id="nric"  placeholder="Enter your IC.No/Passport" name="nric" value="{{ old('nric') }}" autofocus oninput="this.value=this.value.replace(/[^a-zA-Z_0-9-]/g,'');"/>
                 
           
                   @if ($status = Session::get('status'))
      
      
        <span class="help-block">
                           <strong style="color:red">{{$status}}</strong> 
                      </span>
               @endif              
            </div>
        </div>
        <div class="form-group">
         
         <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
              
                 
                  <input  type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" 
                    @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
             
            </div>
        </div>
        <span class="button-checkbox">
          <button type="button" class="btn" data-color="info">Remember Me</button>
                    <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
          <a href="/password/reset" class="btn btn-link pull-right">Forgot Password?</a>
        </span>
        <hr class="colorgraph">
          <div class="row">
         
          <div class="col-xs-6 col-sm-6 col-md-6">
            <a href="/register" class="btn btn-lg btn-primary btn-block">Register</a>
          </div>
           <div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Sign In">
          </div>
        </div
       

      </form>

    </div>


    </span>
  </div>

         <!-- TABS APCS-->









 <!-- TABS ANNOUNCE EIA-->
      

  <div class="clearfix"></div>

        </div>
       <!--  <footer>
      <div class="credit row">
        <center><div >
           <div id="templatemo_footer">Copyright © 2017 Jabatan Alam Sekitar
          </div>        </div>

      </div>
        </footer> -->
        <footer>Copyright © 2017 Jabatan Alam Sekitar</footer>
<script type="text/javascript">
  $(function()
{
    $("#myemailform").validate(
      {
        rules: 
        {
          nric: 
          {
            required: true,
          },
          password: 
          {
            required: true,
            
          }
        },
        messages: 
        {
          nric: 
          {
            required: "This is required field"
          },
          password: 
          {
            required: "This is required field"
          }
        }
      }); 
});
</script>
  </body>
</html>
