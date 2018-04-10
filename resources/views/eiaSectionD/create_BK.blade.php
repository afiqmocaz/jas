<!DOCTYPE html>
<html lang="en">
<head>
  <html lang="en">
<head>
  <title>EIA Section A</title>
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

 <script type="text/javascript">
        function GetDays(){
                var dropdt = new Date(document.getElementById("datepicker2").value);
                var pickdt = new Date(document.getElementById("datepicker").value);
                return parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
        }

        function cal(){
        if(document.getElementById("datepicker2")){
            document.getElementById("numdays2").value=GetDays();
        }  
    }

    </script>

    <script type="text/javascript">
        function GetMonths(){
                var dropdate = new Date(document.getElementById("datepicker2").value);
                var pickdate = new Date(document.getElementById("datepicker").value);
                return parseInt((dropdate - pickdate) / (24 * 3600 * 1000) / 30);
        }

        function calculate(){
        if(document.getElementById("datepicker2")){
            document.getElementById("numMonths2").value=GetMonths();
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

  #myemailform .error {
    color: red;
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
   <!-- NAVIGATION BAR -->
  <div class="container" style="width: 100%">
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
              
                    <li class="disabled"><a>SECTION E</a></li>
              
                    <li class="disabled"><a>SECTION F</a></li>
            </ul>
            </div> <!-- nav -->
          </div>
          </div>
  <!-- NAVIGATION BAR -->

@if (Session::has('success'))

        <div class="alert alert-success" role="alert">
    
        <strong>Success:</strong>  {{ Session::get('success') }}

        </div>

        @endif

        @if (count($errors) > 0)

        <div class="alert alert-danger" role="alert">

        <strong>Errors:</strong><ul>
        @foreach ($errors->all() as $error)
          <br><li>{{ $error }}</li>
        @endforeach
        </ul>
        </div>

        @endif




<!-- PAGE TITLE -->
<center>
  <h2>PRE-QUALIFICATION REGISTRATION FORM</h2>
  
 <h3><strong>
   SECTION D - ENVIRONMENT MANAGEMENT EXPERIENCE
 </strong></h3>
</center>




 
   <!-- INSTRUCTION -->
  <div style="width: 60%; margin-left: 5%" class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">EIA Section D Instruction :</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">   •  Experience must <strong>exceed THREE years and above</strong> to complete this section<br />
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

<!-- FORM -->
<div class="table-responsive">
   <div class="well well-lg"  style="margin-left: 5%; margin-right: 5%; border-color: blue; background-color: #e6f2ff">    
  <table class="table">
    <tbody>
     {!! Form::open(['route' => 'eiaSectionD.store', 'data-parsley-validate'=> '', 'files'=> true,'onsubmit' => 'return validateForm()','id'=>'myform']) !!}
      <tr>
        <td style="width: 15%">
          <label>Participation in</label>
          
        </td>
        <td>
          <label>:</label>
        </td>
        <td>
       
         <select name="participate" class="form-control" style="width: 95%" required="">
           <option data-foo="" value="" disabled="true" selected="true">--Please select your participation--</option>

          @foreach ($manexp as $manexp) 
          {

            <option value="{{ $manexp->name_envmanexp}}">{{ $manexp->name_envmanexp }}</option>
          }
          @endforeach
        </select>
       
        </td>
      </tr>
      <tr>
        <td>
          <label>Name of Project</label>
          
        </td>
        <td>
          <label>:</label>
        </td>
        <td>
          {{ Form::textarea('project_name', '', array('style'=>'width: 90%', 'class'=>'form-control', 'rows' => 5, 'placeholder'=>'Eg: Integrated Research on the Development of Global Climate Risk Management Strategies', 'required' => '','maxlength'=>100,'minlength'=>5))}}
        </td>
      </tr>
      <tr>
        <td>
          <label>Position</label>
          
        </td>
        <td>
          <label>:</label>
        </td>
        <td>

          <select name="position" class="form-control" style="width: 30%" required="">
            <option data-foo="" value="" disabled="true" selected="true">--Please select your position--</option>

          @foreach ($position as $position) 
          {

            <option value="{{ $position->position_name}}">{{ $position->position_name }}</option>
          }
          @endforeach
        </select>
        </td>
      </tr>
      <tr>
        <td>
          <label>Responsibilities</label>
          
        </td>
        <td>
          <label>:</label>
        </td>
        <td>
          {{ Form::textarea('responsibilities', '', array('style'=>'width: 90%', 'class'=>'form-control', 'rows' => 5, 'placeholder'=>'Eg: Prevent and remedy pollution incidents', 'required' => '','maxlength'=>255,'minlength'=>30))}}
        </td>
      </tr>
      <tr>
        <td>
          <label>Date</label>
          
        </td>
        <td>
          <label>:</label>
        </td>
        <td>
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">Date Start</span>
              <input type="date" class="textbox" id="datepicker" name="dateStart" onchange="cal();calculate();dateValidate(this)" required="" />

            </div>
          </div>
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">Date End</span>
              <input type="date" class="textbox" id="datepicker2" name="dateEnd" onchange="cal();calculate()" required=""/>
             
            </div>
             <text id="validationdate" style="color:red"></text>
          </div>
          <br><br><br>
          <div id="numdays" style="margin-left: 2%" class="left"><label class="form">Number of days:</label><input type="textbox" class="form-control" id="numdays2" name="numdays" readonly="readonly" style="width: 30%" /></div>
          <div id="numMonths" class="left"><label class="form">Number of months:</label><input type="textbox" class="form-control" id="numMonths2" name="numMonths" readonly="readonly" style="width: 30%" /></div>
        </td>
      </tr>
      <tr>
          <td>
            <label>Supporting Document</label>
          
            </td>

            <td>
              <label for="example-text-input" class="col-2 col-form-label">:
            </td>
            <td>
             
                  <input type="file" name="supportdoc" required="" accept=".pdf" onchange="ValidateSingleInput(this);">
                  <small style="color:red">PDF Format only</small>
        </td>
      </tr>
      <tr>
        <td colspan="3"><u><center>
        <div class="col-xs-12" style="height:50px;"></div>

          <label style="color: blue;">PROJECT REFERENCE</label></center></u>
        
        </td>
      </tr>
       <tr>
        <td>
          <label>Name</label>
          
        </td>
        <td>
          <label>:</label>
        </td>
        <td>
          {{ Form::text('ref_name', '', array('style'=>'width: 90%', 'class' => 'form-control', 'maxlength'=>'255','placeholder'=>'Eg: Hussin Bin Muhammad', 'required' => '','minlength'=>3))}}
        </td>
      </tr>
      <tr>
        <td>
          <label>Referer Position</label>
          
        </td>
        <td>
          <label>:</label>
        </td>
        <td>
          {{ Form::text('ref_position', '', array('style'=>'width: 90%', 'class' => 'form-control', 'maxlength'=>'50','placeholder'=>'Eg: Site Supervisor', 'required' => '', 'minlength'=>5))}}
        </td>
      </tr>
      <tr>
        <td>
          <label>Address</label>
          
        </td>
        <td>
          <label>:</label>
        </td>
        <td>
          {{ Form::textarea('ref_address', '', array('style'=>'width: 90%', 'class'=>'form-control', 'rows' => 5, 'placeholder'=>'Eg: No. 64, Jln Pahlawan 21, Taman Pahlawan', 'maxlength'=>'255','required' => '','minlength'=>10))}}
        </td>
      </tr>
      <tr>
        <td>
          <label>Email</label>
          
        </td>
        <td>
          <label>:</label>
        </td>
        <td>
          {{ Form::email('ref_email', '', array('class' => 'form-control', 'style' => 'width: 50%', 'maxlength'=>'100','placeholder'=>'Eg: izzat@gmail.com', 'required' => ''))}}
          </td>
      </tr>

    </tbody>
  </table>
</div>
<button type="submit" class="button next" style="margin-right: 15%">Next</button>
  <button type="button" class="button" onclick="window.location.href='/eiaSectionE/create'">Skip</button>
  </br>
</div></div>

  {!! Form::close() !!}
    

</br></br>

</div></div></div>    


<!-- FOOTER -->
    <div class="container">
           <!--   <footer>
      <div class="credit row">
        <center><div class="col-md-6 col-md-offset-3">
          <div id="templatemo_footer">Copyright © 2017 Jabatan Alam Sekitar
          </div>
        </div>
            
      </div>
    </footer> -->
      

      
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
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </div>
<!-- FOOTER -->

<script type="text/javascript">
 var _validFileExtensions = [".pdf"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }

    var file = oInput.files[0];
    if (file.size > 10485760) {
         //Now Here I need to update <span> 

       alert('Filesize must 10mb or below');
        // don't want alert message
        oInput.value = "";
    }
    return true;
}
</script>

 <script type="text/javascript">
$("#datepicker2").change(function () {
    var startDate = document.getElementById("datepicker").value;
    var endDate = document.getElementById("datepicker2").value;
 
    if ((Date.parse(endDate) <= Date.parse(startDate))) {
       $('#validationdate').html("End date should be greater than Start date");
        document.getElementById("datepicker2").value = "";
    }
    else{
       $('#validationdate').html("");
    }
});
</script>
</body>
</html>
