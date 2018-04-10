<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Consultant Registration Scheme </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('/node_modules/admin-lte/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
    <link href="{{ asset('/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('/node_modules/admin-lte/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset('/node_modules/admin-lte/dist/css/skins/skin-purple.min.css')}}" rel="stylesheet" type="text/css" />




    <![endif]-->
    <style type="text/css">
.popover{
    max-width: 30%; // Max Width of the popover (depending on the container!)
    max-height: 1000px;

}
.content-wrapper,
.right-side {
background-color: #ffffff;
}
    </style>
    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
        ]) !!};
        var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    </script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  
    
    <!-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> -->

    @yield('js')
    
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

    <!-- Header -->
    @include('header2')

    <!-- Sidebar -->
   

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('title')
            <!-- <h1>
                {{ $page_title or "Page Title" }}
                <small>{{ $page_description or null }}</small>
            </h1> -->
            <!-- You can dynamically generate breadcrumbs here -->
            <!--<ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>-->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
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
               
            </div>
            @yield('content')

            
            <!--Modal dialog: Profil Saya-->

            
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
   

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<!--<script src="{{ asset ('/node_modules/admin-lte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>-->
<!-- Bootstrap 3.3.2 JS -->

<!-- <script src="{{ asset ('/node_modules/admin-lte/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script> -->
<!-- AdminLTE App -->
<script src="{{ asset ('/node_modules/admin-lte/dist/js/app.min.js') }}" type="text/javascript"></script>
 
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
	$(this).next('ul').toggle();
	e.stopPropagation();
	e.preventDefault();
  });
});


var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
var errPanel =

function errPanel(listError){
    var text = '';
    listError.forEach(function(msg){
       text = text + '<font color="red">&#x25cf; ' + msg + '</font><br>';
    });

    var errorPanel  = '<div class="panel panel-danger"> <div class="panel-heading"> <h3 class="panel-title">Ralat</h3> </div> <div class="panel-body">'+text+'</div> </div> </div>'; 
    return errorPanel;
}

function getClassMonthList(){
    
    console.log("set month list");
     var index = 0;
    $('.MONTH_LIST').append('<option value="">Sila-Pilih</option>');
    monthNames.forEach(function($obj){
    $('.MONTH_LIST').append('<option value='+index+'>' + $obj + '</option>');
        index++;
    })
}
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
</body>
</html>