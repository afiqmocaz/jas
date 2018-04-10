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
    loaddata();
      function loaddata() {
          $.ajax({
        type: "POST",
        dataType: "json",
             url: '/applicant/findSection',
        data: {
           category : 'apcs',
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
             
 var data = response;
 console.log(data);
         if(data.data.user_id){
          $("#apcsSectionA").attr("href", "/apcsSectionA/create");
           
         }
        if(data.data2.user_id){
          $("#apcsSectionB").attr("href", "/apcsSectionB/create");
            }
         if(data.data3.user_id){
          $("#apcsSectionC").attr("href", "/apcsSectionC/create");
            }
             if(data.data4.user_id){
          $("#apcsSectionD").attr("href", "/apcsSectionD/create");
            }
             if(data.data5.user_id){
          $("#apcsSectionE").attr("href", "/apcsSectionE/create");
            }
             if(data.data6.user_id){
          $("#apcsSectionF").attr("href", "/apcsSectionF/create");
            }
        }
    });
      }
        eiaapplicant();
      function eiaapplicant() {
          $.ajax({
        type: "POST",
        dataType: "json",
             url: '/applicant/findSection',
        data: {
           category : 'eia',
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
             
 var data = response;
 console.log(data);
         if(data.data.user_id){
          $("#eiaSectionA").attr("href", "/eiaSectionA/create");
           
         }
        if(data.data2.user_id){
          $("#eiaSectionB").attr("href", "/eiaSectionB/create");
            }
         if(data.data3.user_id){
          $("#eiaSectionC").attr("href", "/eiaSectionC/create");
            }
             if(data.data4.user_id){
          $("#eiaSectionD").attr("href", "/eiaSectionD/create");
            }
             if(data.data5.user_id){
          $("#eiaSectionE").attr("href", "/eiaSectionE/create");
            }
             if(data.data6.user_id){
          $("#eiaSectionF").attr("href", "/eiaSectionF/create");
            }
        }
    });
      }
       ietsapplicant();
      function ietsapplicant() {
          $.ajax({
        type: "POST",
        dataType: "json",
             url: '/applicant/findSection',
        data: {
           category : 'iets',
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
             
 var data = response;
 console.log(data);
         if(data.data.user_id){
          $("#ietsSectionA").attr("href", "/ietsSectionA/create");
           
         }
        if(data.data2.user_id){
          $("#ietsSectionB").attr("href", "/ietsSectionB/create");
            }
         if(data.data3.user_id){
          $("#ietsSectionC").attr("href", "/ietsSectionC/create");
            }
             if(data.data4.user_id){
          $("#ietsSectionD").attr("href", "/ietsSectionD/create");
            }
             if(data.data5.user_id){
          $("#ietsSectionE").attr("href", "/ietsSectionE/create");
            }
        }
    });
      }
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
</body>
</html>