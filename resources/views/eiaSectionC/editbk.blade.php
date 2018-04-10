<!DOCTYPE html>
<html lang="en">
<head>
  <title>EIA Section C</title>
  <!-- <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/justified-nav.css" rel="stylesheet" type="text/css">
  <link href="css/templatemo_style.css" rel="stylesheet" type="text/css"> -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  {!!Html::style('css/bootstrap.min.css')!!}
  {!!Html::style('css/justified-nav.css')!!}
  {!!Html::style('css/templatemo_style.css')!!}
  {!!Html::style('css/parsley.css')!!}
  {!!Html::style('css/button.css')!!}

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
       .navbar-header {
      background-color: #006e00;
    }
    input:invalid,
   
    textarea:invalid,
    input[type=radio]:invalid {
      border-color: 1px solid red;
      background-color:  #ffe6e6;
      outline: 1px solid red;
    }
     select:required:invalid {
  border-color: 1px solid red;
      background-color:  #ffe6e6;
      outline: 1px solid red;
}
option[value=""] {

}
option {
  color: black;
}
</style>
</head>
<body>

<div class="container">





<!-- HEADER -->
    <div class="container">
    <div>
       <img src="{{URL::asset('/image/banner1.png')}}" alt="profile Pic" height="100" width="2048", class="img-responsive cleaner">
      <!--<img src="image/banner1.png" alt="header image" width="2048" height="100" class="img-responsive cleaner">-->
    </div>
    <div class="col-xs-10" style="height:20px;"></div>
    </div>
  <!-- HEADER -->






<!-- DISPLAY PERSONAL INFO -->
<div class="col-xs-10" style="height:20px;"></div>   


 <div style="margin-left: 80%">
<ul class="nav navbar-nav" style="color:black">
  
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

</div>
  
<!-- DISPLAY PERSONAL INFO -->






  <!-- NAVIGATION BAR -->
  <div class="container">
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
  <h2>PRE-QUALIFICATION REGISTRATION FORM</h2>
  
 <h3><strong>
   SECTION C - COMPETENCY COURSE FROM INSTITUT ALAM SEKITAR MALAYSIA (EiMAS)
 </strong></h3>
</center>

 
<!-- INSTRUCTION -->
  <div style="width: 60%; margin-left: 10%" class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">EIA Section C Instruction :</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">   •  Applicant must have attend at least <strong>ONE</strong> courses<br />
   •  Choose only <strong>ONE</strong> option from Name / Course Title and enter major of your study in text box given<br />
   •  Choose date you complete your course<br />
   •  Enter centificate number of your course<br />
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
   <div class="well well-lg"  style="border-color: blue; margin-left: 2%; margin-right: 2%; background-color: #e6f2ff">    
  <table class="table">
    <tbody>
    {!! Form::model($eiaSectionC, ['route' =>['eiaSectionC.update', $eiaSectionC->id], 'method' => 'PUT', 'files' => true]) !!}
      <tr>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">Name / Course Title</label>
          <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label>
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
        <select class="form-control" name="course" id="course"  required style="width:75%">
            <option value="{{ $eiaSectionC->course}}" disabled="true">{{ $eiaSectionC->course}}</option>
          
          @foreach ($course as $course) 
          {

            <option value="{{ $course->course_name}}">{{ $course->course_name }}</option>
          }
          @endforeach
        </select>
        </td>
      </tr>
      <tr>
        <td style="width: 20%;">
          <label for="example-text-input" class="col-2 col-form-label">Date Completed</label>
          <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label>
        </td>
        <td style="width: 5%;">
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
         <div class="input-group date" id="datepickerDemo17">
    
        <input type="text" class="form-control inputan kusus" id="date_complete" data-format="dd-MM-yyyy" name="date_complete"  value="{{$eiaSectionC->date_complete}}" style="width: 55%" onchange="checkDate()"/>  
        </div>
        </td>
      </tr>
      <tr>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">Certificate No.</label>
          <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label>
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          {{ Form::text('cert_no', null, array('class' => 'form-control', 'style' => 'width: 25%', 'placeholder'=>'Eg: AF 32457', 'required' => '', 'maxlenght'=>10,'minlength'=>5))}}
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



   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!--   <script>
  $("#datepicker").datepicker({dateFormat: "yy/mm/dd"});
  $("#datepicker2").datepicker({dateFormat: "yy/mm/dd"});
  </script> -->


    </div>
<!-- FOOTER -->
<script type="text/javascript"> 
$(function(){
    $("#date_complete").datepicker({
       
         dateFormat: 'dd-mm-yy',
       //  minDate: -20, 
         maxDate: "+0m +0D"
    });
})
</script>


</body>
</html>
