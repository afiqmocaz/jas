<!DOCTYPE html>
<html lang="en">
<head>
  <title>APCS Logout</title>
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
      <img src="{{URL::asset('/image/banner1.png')}}" alt="profile Pic" height="100" width="2048", class="img-responsive cleaner">
      <!--img src="image/banner1.png" alt="header image" width="2048" height="100" class="img-responsive cleaner"-->
   </div>
    <div class="col-xs-10" style="height:20px;"></div>
    </div>
  <!-- HEADER -->






<!-- DISPLAY PERSONAL INFO -->
<div class="col-xs-10" style="height:20px;"></div>   

 <div class="well well-sm"  style="margin-left: 15%; margin-right: 15%; background-color: white">
 <table style="width: 70%">
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
    </tbody>  
  </table>
  <br><br>
  <div class="well well-lg" style="width: 50%;margin-left: 25%; background-color: #e0e0d1">
  <table style="width: 100%">
    <tr>
      <td>
        Your application has been submitted. We will review your application and we will informed you to proceed for the next process. Thank you.
      </td>
    </tr>
    
  </table>
</div>
  </div>
 
<!-- DISPLAY PERSONAL INFO -->





  <!-- NAVIGATION BAR -->
<!--   <div class="container">
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
            </div> 
          </div>
          </div> -->
  <!-- NAVIGATION BAR -->







<!-- PAGE TITLE -->



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
        alert("We have received your registration form. We will process your registration within 3 working days and we will inform the status of your registration through your email.\n\n Please logout after finish your submission.\n\n Thank you");
    } else {
        return false;
    }
}
</script>
    </div>
<!-- FOOTER -->
</body>
</html>




