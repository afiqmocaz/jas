@if(App\User::permission('applicants'))
<html lang="en">
<head>
  <html lang="en">
<head>
  <title>EIA Section F</title>
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
              
                    <li class="active"><a href="/eiaSectionF/create">SECTION F</a></li>
              
              
            </ul>
            </div> <!-- nav -->
          </div>
          </div>
  <!-- NAVIGATION BAR -->



<!-- PAGE TITLE -->
<center>
  <h2>PRE-QUALIFICATION REGISTRATION FORM</h2>
  
 <h3><strong>
   SECTION F - DECLARATION
 </strong></h3>

 </center>




   <!-- INSTRUCTION -->
  <div style="width: 60%; margin-left: 10%" class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">EIA Section F Instruction :</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">•  You are <strong style="color: red">NOT ALLOWED</strong> to go to next page before completing this section<br />
   •  Click on button <strong>Cancel Registration</strong> to cancel your application<br />
   •  Click on button <strong>Submit</strong> to save your application and finish the registration
        </div>
      </div>
    </div>
  </div>
  <script>
  $(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
  });
  </script>
 
  
      
<!-- FORM -->
<div class="col-xs-12" style="height:50px;"></div>

<div class="table">
   <div class="well well-lg"  style="margin-left: 10%; margin-right: 10%; border-color: blue; background-color: #e6f2ff">  

      {!! Form::open(['route' => 'eiaSectionF.store', 'data-parsley-validate'=> '', 'onsubmit' => 'return ConfirmSubmit()']) !!}

   <h3><strong>
  CODE OF PRACTICE
</strong></h3>
<p>
  All applicants <strong style="color: blue"> must sign and agree </strong>to abide by the Code of Practice, which is designed to ensure that registered individuals act in an ethical and professional manner.</p>
<p><strong style="color: blue">All registered individuals shall:</strong></p>
</p>   
<p style="margin-left: 7%">
        •    <strong style="color: blue">Act professionally, accurately and in an unbiased manner </strong></p>
        <p style="margin-left: 7%">
        •    <strong style="color: blue">Strive</strong> to increase the competence and prestige of the environmental impact assessment profession</p>
        <p style="margin-left: 7%">
        •    <strong style="color: blue">Assist those under my supervision </strong>(if relevant) in developing their management, professional and
             environmental impact assessment skills</p>
             <p style="margin-left: 7%">
        •    <strong style="color: blue">Not to undertake any jobs</strong> that I am not competence to perform</p>
        <p style="margin-left: 7%">
        •    <strong style="color: blue">Not to represent conflicting or competing interests </strong>and to disclose to any client or employer any
             relationship that may influence my judgement</p>
             <p style="margin-left: 7%">
        •    <strong style="color: blue">Not to accept any inducement, commission, gift or any other benefit </strong>from any interested party or
             knowingly allow colleagues to do so</p>
             <p style="margin-left: 7%">
        •    <strong style="color: blue">Not to intentionally communicate false or misleading information </strong>that may compromise the integrity of
             any EIA study</p>
             <p style="margin-left: 7%">
        •    <strong style="color: blue">Not to act in any way that would prejudice the reputation of the EIA Consultants Registration Scheme </strong>
             or the environmental consultants registration process and to cooperate fully with any enquiry in the
             event of any illegal breach of this code</p>




  <!-- <table class="table">
    <tbody>
   <tr>
        <td>
          <em><label style="width: 80%" for="example-text-input" class="col-2 col-form-label">Upload your I/C or passport here :</label></em>
        </td>
      </tr>
      <tr>
      <td>
          <input style="width: 80%" type="file" id="myFile" size="50">
        </td>
        </tr>
      </tbody>
      </table> -->
      <br><br>
      <div class="well" style="background-color: #ccd1d9">
   
    <input id="txt" class="field" name="agree" type="checkbox" value="1"> I hereby apply for registration and agree to observe and abide by the Code of Practice specified
         in the final part of this form. I certify that the statements contained in this form.
      </div></div></div>

<div id="txtA" style="display:none">
{!! Form::open(['route' => 'eiaSectionF.store', 'data-parsley-validate'=> '', 'onsubmit' => 'return ConfirmSubmit()']) !!}
            <!-- <input name="declaration" type="hidden" value="I hereby apply for registration and agree to observe and abide by the Code of Practice specified
         in the final part of this form. I certify that the statements contained in this form."> -->
            <button name="submit" type="submit" class="button save" style="margin-right: 15%">Submit</button>
            <!--  data-toggle="modal" data-target="#submit" -->
</div></div>

{!! Form::close() !!}
       <br><br>     

<!-- popup sign up -->
 <!--  <div class="modal" id="submit">
    <div class="modal-dialog"> -->
    
      <!-- popup sign up-->
<!--       <div class="modal-content">
        <div class="modal-header" style="border-color: transparent">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body"> -->
<!--         <h5>You have completed the Pre-Qualification Registration Form</h5>
 -->    <!--     <div class="well" style="background-color: #ccffcc">
            <p>You have completed the Pre-Qualification Registration Form</p>
          </div>
          <p style="color: blue">&nbsp &nbsp &nbsp Are you sure to submit this application?</p>
        <div class="modal-footer" style="border-color: transparent">
          
          <button type="button" href="#" data-dismiss="modal" class="button delete">No</button>
           <button type="button" data-toggle="modal" href="#notify" class="button save">Yes</button>         

        </div>
        </div>

      </div> -->
      <!-- popup sign up-->
      
<!--     </div>
  </div>

  <div class="modal" id="notify" data-backdrop="static">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="border-color: transparent">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <div class="well" style="background-color: #ccffcc"><center>
            We have received your registration form. We will process your registration within 3 working days and we will inform the status of your registration through your email.
          </br></br></br>
          Thank you.
          </br></br>
          <button type="button" onclick="location.href='/homepage/create'" class="button">Close</button>
          </center></div>
        </div>
      </div>
    </div>
</div>
  <div class="col-xs-12" style="height:50px;"></div>
<!-- popup sign up -->  


<!-- FOOTER -->
    <!--<div class="container">
              <footer>
      <div class="credit row">
        <center><div class="col-md-6 col-md-offset-3">
         <div id="templatemo_footer">Copyright © 2017 Jabatan Alam Sekitar
          </div>
        </div>
            
      </div>
    </footer>-->
      

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
    <!-- <script>
    $(function() {
      $( "#datepicker" ).datepicker();
      $( "#datepicker2" ).datepicker();
    });
    </script> -->

    <script>
  $('#txt').click(function() {
    $("#txtA").toggle(this.checked);
});
</script>
<script>
function ConfirmSubmit() {
    var r = confirm("You have completed the Pre-Qualification Registration Form.\n\nAre you sure to submit this application?\n\n Click OK to confirm the data or CANCEL to cancel!");
    if(r==true) {
      // $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
        // alert("We have received your registration form. We will process your registration within 3 working days and we will inform the status of your registration through your email\n\n Please logout after finish your submission.\n\n Thank you");
        window.location.href = '/eiaSectionF';
    } else {
        return false;
    }
}
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

