@if(App\User::permission('applicants'))
<html lang="en">
<head>
  <html lang="en">
<head>
  <title>EIA Section B</title>
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
          <li class="active"><a href="/eiaSectionA/show">SECTION A</a></li>
                    <li class="active"><a href="/eiaSectionB/show">SECTION B</a></li>
                    <li class="disabled"><a>SECTION C</a></li>

                    <li class="disabled"><a>SECTION D</a></li>
              
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
  <h2> PRE-QUALIFICATION REGISTRATION FORM</h2>
  
 <h3><strong>
   SECTION B - ACADEMIC QUALIFICATIONS
 </strong></h3>
 
   </center>
   
          

<!-- INSTRUCTION -->
  <div style="width: 60%; margin-left: 10%" class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">EIA Section B Instruction :</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">   •  Choose only <strong>ONE</strong> option from Name / Course Title and enter major of your study in text box given<br />
   •  Enter your Name of University / College<br />
   •  Enter your start Period of Study to end of your study<br />
   •  Click on <strong>Choose File </strong> to upload your Academic Certification and upload in <strong>PDF</strong><br />
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
   <div class="well well-lg"  style="margin-left: 10%; margin-right: 10%; border-color: blue; background-color: #e6f2ff">    
  <table class="table">
    <tbody>
        {!! Form::model($eiaSectionB, ['route' =>['eiaSectionB.update', $eiaSectionB->id], 'method' => 'PUT', 'files' => true,'onsubmit' => 'return validateForm()','id'=>'myform']) !!}
        <tr>
          <td>
            <label>Name / Course Title</label>
            
          </td>
          <td>
            <label>:</label>
          </td>
          <td>
          @if($eiaSectionB->coursetitle == 'Bachelor in Science' || $eiaSectionB->coursetitle == 'Bachelor in Engineering')
            {{ Form::radio('coursetitle', 'Bachelor in Science' , false) }}
          
          {{ Form::label('Bachelor in Science')}}
           </br>
          {{ Form::radio('coursetitle', 'Bachelor in Engineering' , false) }}
          {{ Form::label('Bachelor in Engineering')}}
           </br>
           
           @else
           

          {{ Form::radio('coursetitle', 'Bachelor in Science' , false) }}
          
          {{ Form::label('Bachelor in Science')}}
           </br>
          {{ Form::radio('coursetitle', 'Bachelor in Engineering' , false) }}
          {{ Form::label('Bachelor in Engineering')}}
           </br>
           {{ Form::radio('coursetitle', 'Master' , false) }}
          {{ Form::label('Master')}}
           </br>
          {{ Form::radio('coursetitle', 'PhD' , false) }}
          {{ Form::label('PhD')}}

           

           @endif
          
          </br>
          </br><em><p style="color: #aab2bd" class="col-2 col-form-label">( Enter your major here )</p></em>
          
          {{ Form::text('major', null, array('class' => 'form-control', 'style' => 'width: 95%', 'placeholder'=>'Eg: Software Engineering', 'required' => '','maxlength'=>150))}}
          </td></tr>
          <tr>
          <td>
            <label>Name of University / College</label>
          
          </td>
          <td>
            <label>:</label>
          </td>
          <td>
            {{ Form::text('universityname', null, array('class' => 'form-control', 'style' => 'width: 95%', 'placeholder'=>'Eg: Universiti Malaysia Pahang', 'required' => '','maxlength'=>100))}}
          </td>
          </tr>
          <tr>
          <td>
            <label>Period of Study</label>
          
          </td>
          <td>
             <label>:</label>
          </td>
          <td>
            <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">From</span>
             {{ Form::select('from', [$eiaSectionB->date_from], $eiaSectionB->date_from, array('id' => 'year', 'class' => 'form-control', 'style' => 'width: 90%', 'required' => '' )) }}
            </div>
          </div>
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">To</span>
             {{ Form::select('to', [$eiaSectionB->date_to], $eiaSectionB->date_to, array('id' => 'year2', 'class' => 'form-control', 'style' => 'width: 90%', 'required' => '' )) }}
            </div>
          </div>
          </td>
        </tr>
        <tr>
        
        <td><label>File Uploaded</label></td>
         <td>
              <label>:
            </td>
        <td><a style="color:blue" class="file" src="/uploads/{{$eiaSectionB->cert}}" href="/uploads/{{$eiaSectionB->cert}}" target="_blank">{{$eiaSectionB->cert}}</a></td>
      </tr>
        <tr>
          <td>
            <label>Academic Certification</label>
          
            </td>

            <td>
              <label>:
            </td>
            <td>
              <!-- {{ Form::file('cert_file')}} -->
              <input type="file" name="cert_file" accept=".pdf" onchange="ValidateSingleInput(this);" >

        </td>
      </tr>
      
    </tbody>
  </table>
</div>
<button type="submit" class="button save" style="margin-right: 15%">Update</button>
  </br>

</div></div>

  {!! Form::close() !!}
    

</br></br>

</div></div></div>

<!-- FOOTER -->
    <div class="container">
              <footer>
      <div class="credit row">
        <center><div class="col-md-6 col-md-offset-3">
          <div id="templatemo_footer">Copyright © 2017 <a href="#">Jabatan Alam Sekitar</a>
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

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
   <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

 <script type="text/javascript">
      var start = 1900;
var end = new Date().getFullYear();
var options = "";
var options2 = {{$eiaSectionB->date_from}};
options += "<option>"+ options2 +"</option>";
for(var year = start ; year <=end; year++){
  options += "<option>"+ year +"</option>";
}
document.getElementById("year").innerHTML = options;
    </script>

    <script type="text/javascript">
      var start = 1900;
var end = new Date().getFullYear();
var options = "";
var options2 = {{$eiaSectionB->date_to}};
options += "<option>"+ options2 +"</option>";
for(var year = start ; year <=end; year++){
  options += "<option>"+ year +"</option>";
}
document.getElementById("year2").innerHTML = options;
    </script>
<!--   <script>
  $("#datepicker").datepicker({dateFormat: "yy/mm/dd"});
  $("#datepicker2").datepicker({dateFormat: "yy/mm/dd"});
  </script> -->
    </div>
     <script>
function validateForm() {
    var x = document.forms["myform"]["year"].value;
    var y = document.forms["myform"]["year2"].value;
    if (x >= y) {
        alert("The year from must be smaller than the year to.");
        return false;
    }
    
}
</script>

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
    return true;
}
</script>


<!-- FOOTER -->
</body>
 @else
<center><h1>NO PERMISSION TO ACCESS.PLEASE LOG IN INTO THE SYSTEM.</h1>
<a href="/">Login</a>
</center>
@endif
</html>
