@if(App\User::permission('applicants'))
<html lang="en">
<head>
  <html lang="en">
<head>
  <title>EIA Section E</title>
<!--   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/justified-nav.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<!--   <link href="css/templatemo_style.css" rel="stylesheet" type="text/css">

 --> 
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  {!!Html::style('css/bootstrap.min.css')!!}
  {!!Html::style('css/justified-nav.css')!!}
 {!!Html::style('css/templatemo_style1.css')!!}
  {!!Html::style('css/parsley.css')!!}
  {!!Html::style('css/button.css')!!}

 <script>
    function SameAs(f) {
  if(f.sameas.checked == true) {
    f.mailaddress.value = f.address.value + ", " + f.city.value + ", " + f.state.value + ", " + f.country_id.value;
    f.mailpostcode.value = f.postcode.value;
  }
}
  </script>


<style type="text/css">
  .well {
  background: white;
}
  .table th, .table td {
    border-top: none !important;
    border-left: none !important;
}
.fixed-table-container {
    border:0px;
}
button {
  float: right;
}
h3{
  font-size: 15px;
  font-style: bold;
}
.popover{
    max-width: 35%; /* Max Width of the popover (depending on the container!) */
}
.navbar { border: none; }
.navbar.templatemo-mobile-menu {
  position: fixed;
  top: 29px;
  right: 2px;
  z-index: 1000;
}
li {
        float: left;
    }

    li a, .dropbtn {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover, .dropdown:hover .dropbtn {
        background-color: #00ad00;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #006e00;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        font-weight: bold;
        padding: 5px 27px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover {background-color: #00ad00}

    .dropdown:hover .dropdown-content {
        display: block;
    }

    input:invalid,
    select:invalid,
    textarea:invalid,
    input[type=radio]:invalid {
      border-color: 1px solid red;
      background-color:  #ffe6e6;
      outline: 1px solid red;
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

</style>

</head>
<body>
<!-- HEADER -->
   <!--  <div class="container">
     <div>
      <img src="{{URL::asset('/image/banner1.png')}}" alt="profile Pic" height="100" width="2048", class="img-responsive cleaner"> -->
      <!--img src="image/banner1.png" alt="header image" width="2048" height="100" class="img-responsive cleaner"
   </div> 
    <!-- <div class="col-xs-10" style="height:20px;"></div> -->
    <!-- </div> -->
  <!-- HEADER -->
 

 <!--<div class="well well-sm"  style="margin-left: 5%; margin-right: 15%; background-color: white">
 <table style="width: 60%">
    <tbody>   
      <tr>
        <td>
          <label>&nbsp &nbsp &nbsp NAME </label>
        </td>
        <td>
          <label>: &nbsp &nbsp &nbsp {{ Auth::user()->name }}</label>
        </td>
      </tr>
      <tr>
        <td>
          <label> &nbsp &nbsp &nbsp NRIC / PASSPORT NUMBER</label>
        </td>
        <td>
          <label>: &nbsp &nbsp &nbsp <!-- 931405105499 -->
          <!--</label>
          <strong>{{ Auth::user()->nric }}</strong>
        </td>
      </tr>
     <tr>
        <button  class="small btn-primary" a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Signout</button>
      </tr>  
     <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
    </tbody>  
  </table>
  </div>-->
 
<!-- DISPLAY PERSONAL INFO -->

<!-- <div style="margin-left: 80%">
 
<u></u>l class="nav navbar-nav" style="color:black">
  
    <li id="Menu-Home" style="color:black"> 
    <a href="{{url('/')}}" style="color: black">
      <span class="glyphicon glyphicon-home"></span><strong>Home</strong>
    </a>
    </li>
    <li class="dropdown" ><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:black">
    <span class="glyphicon glyphicon-user" ></span> <strong>Profile</strong> <span class="caret"></span></a>
    <ul class="dropdown-menu"> <li id="Menu-Home" style="color:black"> 
    <a href="{{url('/')}}" style="color: black">
      <span class="glyphicon glyphicon-log-out"></span><strong>Sign Out</strong>
    </a>
    </li>
    </li><li id="Menu-Profile" style="color:black"><a href="/ctsonline/Account/ChangePassword"><span class="glyphicon glyphicon-lock"></span> Change Password</a></li>
    </ul>
    </li>



</ul>

</div> -->

@include('header')
  <!-- NAVIGATION BAR -->
  <div class="container" style="width:100%">
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
          <li class="active"><a href="/eiaSectionA/create">SECTION A</a></li>
                    <li class="active"><a href="/eiaSectionB/create">SECTION B</a></li>
                    <li class="active"><a href="/eiaSectionC/create">SECTION C</a></li>

                    <li class="active"><a href="/eiaSectionD/create">SECTION D</a></li>
              
                    <li class="active"><a href="/eiaSectionE/create">SECTION E</a></li>
              
                    <li class="disabled"><a>SECTION F</a></li>
              
              
            </ul>
            </div> <!-- nav -->
          </div>
          </div>
  <!-- NAVIGATION BAR -->

<!-- PAGE TITLE -->
<center>
  <h2>PRE-QUALIFICATION REGISTRATION FORM</h2>
  
 <h3><strong>
   SECTION E - SPECIALIZED AREA
 </strong></h3>
</center>




    
<!-- INSTRUCTION -->
  <div style="width: 60%; margin-left: 10%" class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">EIA Section E Instruction :</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">   •  Applicant only can only select <strong>maximum of TWO</strong> specialized area from THREE<br />
   •  Click on button <strong>Cancel Registration</strong> to cancel your application<br />
   •  Click on button <strong>Save Draft</strong> to save your application as draft<br />
   •  Click on button <strong>Next</strong> to save your application and continue to next step<br />
   •  You are <strong style="color: red">NOT ALLOWED</strong> to go to next page before completing this section
        </div>
      </div>
    </div>
  </div>
  <script>
  $(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
  });
  </script>
  
  
      
<br>
<div class="table-responsive">
   <div class="well well-lg"  style="margin-left: 10%; margin-right: 10%; border-color: blue; background-color: #e6f2ff"> 
   <label style="color: blue">Please select TWO specialized area to apply</label>
<label style="color: red">*</label>
</br></br>
  <table class="table table-bordered">
    <tbody>
    {!! Form::open(['route' => 'eiaSectionE.store', 'data-parsley-validate'=> '']) !!}
    <tr>
      <td style="width: 50%;background-color: #428bca; color: white"><center>
           <label>First Specialized Area</label>
      </center></td>
      <td style="width: 50%;background-color: #428bca; color: white"><center>
           <label>Second Specialized Area</label>
      </center></td>
    </tr>
     <tr>
        <td><center>
        </br>
        {{ Form::select('first_specialize', ['' => '-- Select Specialize --',
    'Air Pollution Control' =>
    ['Air Pollution Control - Pollution Control Technology' => 'Pollution Control Technology',
    'Air Pollution Control - Impact Assessment' => 'Impact Assessment',
    'Air Pollution Control - Environmental Management' => 'Environmental Management',
    'Air Pollution Control - Performance Monitoring' => 'Performance Monitoring',
    'Air Pollution Control - Environmental Planning' => 'Environmental Planning',
    'Air Pollution Control - Risk Assessment' => 'Risk Assessment'],

    'Water Pollution Control' =>
    ['Water Pollution Control - Pollution Control Technology' => 'Pollution Control Technology',
    'Water Pollution Control - Impact Assessment' => 'Impact Assessment',
    'Water Pollution Control - Environmental Management' => 'Environmental Management',
    'Water Pollution Control - Performance Monitoring' => 'Performance Monitoring',
    'Water Pollution Control - Environmental Planning' => 'Environmental Planning',
    'Water Pollution Control - LDP2M2' => 'LDP2M2'],

    'Waste Management' =>
    ['Waste Management - Pollution Control Technology' => 'Pollution Control Technology',
    'Waste Management - Impact Assessment' => 'Impact Assessment',
    'Waste Management - Environmental Management' => 'Environmental Management',
    'Waste Management - Performance Monitoring' => 'Performance Monitoring',
    'Waste Management - Environmental Planning' => 'Environmental Planning',
    'Waste Management - Risk Assessment' => 'Risk Assessment'],    
], '', array('id' => 'select1', 'class' => 'form-control', 'style' => 'width: 90%', 'required' => ''))}}
        </br></br>
        </center></td>
        <td><center>
        </br>
        {{ Form::select('second_specialize', ['' => '-- Select Specialize --',
    'Air Pollution Control' =>
    ['Air Pollution Control - Pollution Control Technology' => 'Pollution Control Technology',
    'Air Pollution Control - Impact Assessment' => 'Impact Assessment',
    'Air Pollution Control - Environmental Management' => 'Environmental Management',
    'Air Pollution Control - Performance Monitoring' => 'Performance Monitoring',
    'Air Pollution Control - Environmental Planning' => 'Environmental Planning',
    'Air Pollution Control - Risk Assessment' => 'Risk Assessment'],

    'Water Pollution Control' =>
    ['Water Pollution Control - Pollution Control Technology' => 'Pollution Control Technology',
    'Water Pollution Control - Impact Assessment' => 'Impact Assessment',
    'Water Pollution Control - Environmental Management' => 'Environmental Management',
    'Water Pollution Control - Performance Monitoring' => 'Performance Monitoring',
    'Water Pollution Control - Environmental Planning' => 'Environmental Planning',
    'Water Pollution Control - LDP2M2' => 'LDP2M2'],

    'Waste Management' =>
    ['Waste Management - Pollution Control Technology' => 'Pollution Control Technology',
    'Waste Management - Impact Assessment' => 'Impact Assessment',
    'Waste Management - Environmental Management' => 'Environmental Management',
    'Waste Management - Performance Monitoring' => 'Performance Monitoring',
    'Waste Management - Environmental Planning' => 'Environmental Planning',
    'Waste Management - Risk Assessment' => 'Risk Assessment'],    
], '', array('id' => 'select2', 'class' => 'form-control', 'style' => 'width: 90%', 'required' => ''))}}
        </center></td>
        </tr>
    </tbody>
  </table>

</div></div>
<button style="margin-right: 15%" type="submit" class="button next">Next</button>
  {!! Form::close() !!}
    

</br></br>

</div></div></div>
    



<script>
  function preventDupes( select, index ) {
    var options = select.options,
        len = options.length;
    while( len-- ) {
        options[ len ].disabled = false;
    }
    select.options[ index ].disabled = true;
    if( index === select.selectedIndex ) {
        alert('You\'ve already selected the item "' + select.options[index].text + '".\n\nPlease choose another.');
        this.selectedIndex = 0;
    }
}

var select1 = select = document.getElementById( 'select1' );
var select2 = select = document.getElementById( 'select2' );

select1.onchange = function() {
    preventDupes.call(this, select2, this.selectedIndex );
};

select2.onchange = function() {
    preventDupes.call(this, select1, this.selectedIndex );
};
</script>


<!-- FOOTER -->
    <div class="container">
              <footer>
      <div class="credit row">
        <center><div class="col-md-6 col-md-offset-3">
          <div id="templatemo_footer">Copyright © 2017 Jabatan Alam Sekitar
          </div>
        </div>
            
      </div>
    </footer>
      

      
    <!-- templatemo 393 fantasy -->
{!! Html::script('js/parsley.min.js')!!}
{!! Html::script('js/jquery.js')!!}
{!! Html::script('js/bootstrap.min.js')!!}
{!! Html::script('js/templatemo_script.js')!!}
    <!-- templatemo 393 fantasy -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/templatemo_script.js"></script>
    <script type="text/javascript" src="js/disable_navbar.js"></script>

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
   <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $("#datepicker").datepicker({dateFormat: "yy/mm/dd"});
  $("#datepicker2").datepicker({dateFormat: "yy/mm/dd"});
  </script>
    </div>
<!-- FOOTER -->


</body>
 @else
<center><h1>NO PERMISSION TO ACCESS.PLEASE LOG IN INTO THE SYSTEM.</h1>
<a href="/">Login</a>
</center>
@endif
</html>
