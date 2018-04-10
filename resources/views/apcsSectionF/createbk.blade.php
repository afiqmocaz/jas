<!DOCTYPE html>
<html lang="en">
<head>
  <title>APCS Section F</title>
<!--   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<!--   <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/justified-nav.css" rel="stylesheet" type="text/css">
  <link href="css/templatemo_style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"> -->
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
    select:invalid,
    textarea:invalid,
    input[type=radio]:invalid {
      border-color: 1px solid red;
      background-color:  #ffe6e6;
      outline: 1px solid red;
    }
</style>
</head>
<body>


<div class="container">





<!-- HEADER -->
    <div class="container">
    <div>
      <img src="{{URL::asset('/image/banner1.png')}}" alt="header image" width="2048" height="100" class="img-responsive cleaner">
    </div>
    </div>
  <!-- HEADER -->






<!-- DISPLAY PERSONAL INFO -->
<div class="col-xs-10" style="height:20px;"></div>   

  <div class="well well-sm"  style="margin-left: 5%; margin-right: 15%; background-color: white">
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
          <label>: &nbsp &nbsp &nbsp <!-- 931405105499 --></label>
          <strong>{{ Auth::user()->nric }}</strong>
        </td>
      </tr>
     <tr>
        <button  class="small btn-primary " a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Signout</button>
      </tr>  
     <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
    </tbody>  
  </table>
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
          <li class="active"><a href="/apcsSectionA/create">SECTION A</a></li>
                    <li class="active"><a href="/apcsSectionB/create">SECTION B</a></li>
                    <li class="active"><a href="/apcsSectionC/create">SECTION C</a></li>

                    <li class="active"><a href="/apcsSectionD/create">SECTION D</a></li>
              
                    <li class="active"><a href="/apcsSectionE/create">SECTION E</a></li>
              
                    <li class="active"><a href="/apcsSectionF/create">SECTION F</a></li>
              
            </ul>
            </div> <!-- nav -->
          </div>
          </div>
  <!-- NAVIGATION BAR -->







<!-- PAGE TITLE -->
<div class="well well-lg" style="margin-left: 5%; margin-right: 5%">
  <h2 style="margin-left: 5%">PRE-QUALIFICATION REGISTRATION FORM</h2>
  
 <h3 style="margin-left: 5%"><strong>
   SECTION F - DECLARATION
 </strong></h3>







   <!-- INSTRUCTION -->
  <div style="width: 60%; margin-left: 5%" class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">APCS Section F Instruction :</a>
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
  
  
      
<div class="col-xs-12" style="height:50px;"></div>

<!-- FORM -->
<div class="">
   <div class="well well-lg"  style="margin-left: 10%; margin-right: 10%; border-color: blue; background-color: #e6f2ff">    

    {!! Form::open(['route' => 'apcsSectionF.store', 'data-parsley-validate'=> '', 'onsubmit' => 'return ConfirmSubmit()']) !!}

    <h3><strong>
  APPLICANT DECLARATION
</strong></h3>
<br>
      <input type="radio" name="answer" value="This is my first application" id="no" onclick="myFunction(this.value)" required="" />
<label for="This is my first application">This is my first application</label>  
<br><br>
<input type="radio" name="answer" value="I have been listed in the year" id="yes" onclick="myFunction(this.value)" required="" />
<label for="I have been listed in the year">I have been listed in the year</label>

<input type="text" name="edit1" id="edit1" disabled title="Enter digit only. Min : 4, Max : 4" minlength="4" maxlength="4"/>

<br><br>
<input type="radio" name="answer" value="I have applied in" id="other" onclick="myFunction(this.value)" required="" /> 
<label for="I have applied in">I have applied in</label>

<input type="text" name="edit2" id="edit2" disabled title="Enter digit only. Min : 4, Max : 4" minlength="4" maxlength="4"/>
<input type="hidden" id="d" value="but was unsuccessful">

<label name="abc" id="abc">(year) but was unsuccessful</label>
<br><br>
  <input type="hidden" style="width: 50%" id="result">
  <br><br>

  <input style="width: 50%; resize: none;" id='box2' name="confession" type="hidden">


  <!-- <input type="text" name="status_id" id="status_id" value="2"/> -->
    
      <div class="well" style="background-color: #ccd1d9">

  <!--  {{ Form::checkbox('apply', 'I hereby apply for registration/renewal of registration and declare that the information supplied is true and
         accurate to the best of my knowledge and permit DOE to verify the information from the sources concerned.
         I understand that my application may be rejected without notice if the information supplied is found to be untrue.' , false) }}
          {{ Form::label('I hereby apply for registration/renewal of registration and declare that the information supplied is true and
         accurate to the best of my knowledge and permit DOE to verify the information from the sources concerned.
         I understand that my application may be rejected without notice if the information supplied is found to be untrue.')}}
      </div> -->
      <input id="txt" class="field" name="agree" type="checkbox" value="1"> I hereby apply for registration/renewal of registration and declare that the information supplied is true and
         accurate to the best of my knowledge and permit DOE to verify the information from the sources concerned.
         I understand that my application may be rejected without notice if the information supplied is found to be untrue.
</div></div></div>

<div id="txtA" style="display:none">
            <!-- <button type="button" class="button save" data-toggle="modal" data-target="#submit" style="margin-right: 15%">Submit</button> -->
            <!-- <input name="declaration" type="hidden" value="I hereby apply for registration/renewal of registration and declare that the information supplied is true and
         accurate to the best of my knowledge and permit DOE to verify the information from the sources concerned. I understand that my application may be rejected without notice if the information supplied is found to be untrue."> -->
         <!-- I understand that my application may be rejected without notice if the information supplied is found to be untrue. -->
              <button name="submit" onclick='onSubmitClick();' type="submit" class="button save">Submit</button>
            </div>
            
</div>

<!-- <input name="declare" type="text" style="width: 20%"  id="declare">
<input type="submit" value="check value" /> -->
{!! Form::close() !!}

<!-- popup sign up -->
  <!-- <div class="modal" id="submit">
    <div class="modal-dialog"> -->
    
      <!-- popup sign up-->
     <!--  <div class="modal-content">
        <div class="modal-header" style="border-color: transparent">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body"> -->
<!--         <h5>You have completed the Pre-Qualification Registration Form</h5>
 -->        <!-- <div class="well" style="background-color: #ccffcc">
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
      
    <!-- </div>
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
  <div class="col-xs-12" style="height:50px;"></div> -->
<!-- popup sign up --> 
          




<!-- FOOTER -->
    <div class="container">
              <footer>
      <div class="credit row">
        <center><div class="col-md-6 col-md-offset-3">
          <div id="templatemo_footer">Copyright © 2017 <label href="#">Jabatan Alam Sekitar</label>
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
<!--   <script>
   $("#datepicker").datepicker({dateFormat: "yy/mm/dd"});
  $("#datepicker2").datepicker({dateFormat: "yy/mm/dd"});
  </script> -->


    <!-- validate number -->
    <script type="text/javascript">
      $(document).ready(function(){
    $('[id^=edit]').keypress(validateNumber);
});

function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
      return true;
    }
};
    </script>
<!-- validate number -->

<script>
  $('#txt').click(function() {
    $("#txtA").toggle(this.checked);
});
</script>
<script>
function myFunction(answer) {
    document.getElementById("result").value = answer;
}
</script>
<script>
function onSubmitClick() {

  var result = document.getElementById('result'); 
  var box2 = document.getElementById('box2');
  var no = document.getElementById('no'); 
  var yes = document.getElementById('yes'); 
  var other = document.getElementById('other'); 
  var edit2 = document.getElementById('edit2');
  var edit1 = document.getElementById('edit1');
  var d = document.getElementById('d');

  if (document.getElementById('no').checked) {
    box2.value = result.value + ' ';
  }else if (document.getElementById('yes').checked) {
     box2.value = result.value + ' ' + edit1.value;
   }else if (document.getElementById('other').checked) {
     box2.value = result.value + ' ' + edit2.value + ' ' + d.value;
   }
}
</script>
<script>
        $("#no").click(function() {
            $("#edit1").prop("required", false);
            $("#edit1").prop("disabled", true);
            $("#edit2").prop("required", false);
            $("#edit2").prop("disabled", true);
        });
        $("#yes").click(function() {
            $("#edit1").prop("required", true);
            $("#edit1").prop("disabled", false);
            $("#edit1").focus();
            $("#edit2").prop("required", false);
            $("#edit2").prop("disabled", true);
        });
        $("#other").click(function() {
            $("#edit2").prop("required", true);
            $("#edit2").prop("disabled", false);
            $("#edit2").focus();
            $("#edit1").prop("required", false);
            $("#edit1").prop("disabled", true);
        });

    </script>
<script>
function ConfirmSubmit() {
    var r = confirm("You have completed the Pre-Qualification Registration Form.\n\nAre you sure to submit this application?\n\n Click OK to confirm the data or CANCEL to cancel!");
    if(r==true) {
      // $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
        // alert("We have received your registration form. We will process your registration within 3 working days and we will inform the status of your registration through your email.\n\n Please logout after finish your submission.\n\n Thank you");
        window.location.href = '/apcsSectionF';
    } else {
        return false;
    }
}
</script>
    </div>
<!-- FOOTER -->
</body>
</html>




