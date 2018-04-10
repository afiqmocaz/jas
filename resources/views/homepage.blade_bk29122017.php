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

           <link href="/css/app.css" rel="stylesheet">
          <script src="/js/app.js"></script>
  
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
  background-color:#222d32;
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


 #myemailform .error {
   color:red;
font-family:arial;
font-size: 12px;
font-weight: normal;
}



.modal{
    /* respsonsive width */
    margin-left:42%; /* width/2) */ 
   width: 80%;
   margin-top: 50px;

}

.form-group{
  color: black;
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

@include('header')
 
    <br>

    <!-- TABS -->

    <!-- TABS -->



       <div class="back">


  <div class="div-center">


    <div class="content">


        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}" name="myemailform" id="myemailform">
            {{ csrf_field() }}
        <div class="form-group">
        <center><h3 style="color:black">Please Sign In</h3> </center>
        <hr class="colorgraph">
           <div class="{{ $errors->has('nric') ? ' has-error' : '' }}">
              
                
                    
                  <input  type="text" class="form-control" userid="userid" id="nric"  placeholder="Enter your IC.No/Passport" name="nric" value="{{ old('nric') }}" autofocus oninput="this.value=this.value.replace(/[^a-zA-Z_0-9-]/g,'');"/>
                 
           
                    @if ($message = Session::get('status'))
<div class="alert alert-danger alert-block">
  <button type="button" class="close" data-dismiss="alert">&times;</button> 
        <strong>{{ $message }}</strong>
</div>
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
        
  <br>
           <button type="button" class="btn btn-primary btn-sm">
          <span class="glyphicon glyphicon-check"></span> Remember me
        </button>
        <span>
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
<div></div>

    </span>
  </div>

         <!-- TABS APCS-->

<!-- Button trigger modal -->
<button type="button" id="mymodal" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h2> Announcement</h2></center></div>
                    <div class="modal-body">
                 @if(!empty($announce3)) 
                  <CENTER><STRONG><h3>IETS</h3></STRONG></CENTER>
                  @foreach($announce3 as $iets)
                <div class="modal-body">
               <h4><STRONG>{{$iets->subject}}</STRONG></h4>
                {{$iets->announcement}}<br>
                 <a href="{{asset('uploads/'.$iets->original_filename)}}" >Download Document</a>
                </div>
                @endforeach
                @endif
                  @if(!empty($announce))  <CENTER><STRONG><h3>EIA</h3></STRONG></CENTER>
                  @foreach($announce as $eia)
                <div class="modal-body">
                <h4><STRONG>{{$eia->subject}}</h4></STRONG>
                {{$eia->announcement}}<br>
                 <a href="{{asset('uploads/'.$eia->original_filename)}}" >{{$eia->original_filename}}</a>
                </div>
                @endforeach
                @endif
                @if(!empty($announce2))  <CENTER><STRONG><h3>APCS</h3></STRONG></CENTER>
                  @foreach($announce2 as $apcs)
                <div class="modal-body">
                <h4><STRONG>{{$apcs->subject}}</h4></STRONG>
                {{$apcs->announcement}}<br>
                 <a href="{{asset('uploads/'.$eia->original_filename)}}" >{{$eia->original_filename}}</a>
                </div>
                @endforeach
                @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
</div>





 <!-- TABS ANNOUNCE EIA-->
      

  <div class="clearfix"></div>

        </div>
       <!--  <footer>
      <div class="credit row">
        <center><div >
           <div id="templatemo_footer">Copyright &#169; 2017 Jabatan Alam Sekitar
          </div>        </div>

      </div>
        </footer> -->
        <footer>Copyright &#169; 2017 Jabatan Alam Sekitar</footer>
<script type="text/javascript">
  jQuery(document).ready(function(e) {
    jQuery('#mymodal').trigger('click');
});
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
