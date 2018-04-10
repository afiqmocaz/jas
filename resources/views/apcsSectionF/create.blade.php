@extends('layouts.master')
@section('content')
@section('header', ': APCS : SECTION F - DECLARATION')
<html>
  <head>
    <title>CRS Online: Registration</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://vta.doe.gov.my/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrapValidator.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    @include('apcs_sidebar')
    </head>
    <style>
      
        body {font-family: arial;
        }
        form{font-size: 15px;
  margin-top:-20px;
                   width: 100%}
        
      .col-md-4 h1{ color : #9f00a7; font-family: calibri, arial; font-weight: bold; font-size: 30px; position: relative; left: 30px;} 
    .header{background: white; width : 100%; }
    .header a{color: rgb(100,100,100); padding: 20px; position: relative; top : 30px;font-family: calibri, arial;font-weight: 900;  }
    #col-md-4{ height: 50px;}
    .header a:hover{ transition-duration: 0.3s; color: rgb(0,0,0); }
    
    /*container design*/
    .control-label{float: left;}
    .container .inner{width: 480px; margin: 50px auto; border : 1px solid none; background: rgba(55,55,55, 0.4); padding: 50px;transition-duration: 0.7s;}
    .container .inner:hover{-webkit-transform:skew(0deg,0deg); -moz-transform:skew(0deg,0deg);-o-transform:skew(0deg,0deg);transition-duration: 0.7s; background: transparent;}
    .inner h1{color : rgb(200,200,200); font-family: calibri, arial; font-weight: bold; text-align: center; font-size: 20px}
    .inner h3{color: rgb(200,200,200); font-size: 18px; font-family: calibri; text-align: center; margin-top: -5px}
    .inner form label span{color: white;}
    .inner form lagend{color: white;}
    .inner .input{width : 100%; border: none; border-bottom: 1px solid white; color: #9f00a7; background: transparent; padding: 10px;}
    .inner .input:focus{box-shadow: none; border: 1px solid none;}
    .container hr{border-color: rgb(100,100,100);}
    .inner .button{border-radius:10px 10px 10px 10px;color: #FFFFFF; background: rgba(50,50,50, 0.4); padding: 2px 30px ;  border: 2px solid #9f00a7;  font-family: calibri; margin:10px auto; font-weight: bold;}
    .inner .button:hover{background: #8f00a7; color: white;}

    </style>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/jquery.sheepItPlugin.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/bootstrapValidator.min.js"></script>
    <!--<script type="text/javascript" src="https://vta.doe.gov.my/js/jquery.maskedinput.js"></script> -->

    <body>
 <!-- <h4 class="text-center">SECTION F: DECLARATION</h4>
          <hr/>-->
  <div class="section" style="padding: 0px;">
    <div class="row">
         

          <form role="form" method="POST" action="{{ route('apcsSectionF.store')}}" name="applicantForm" id="applicantForm"  accept-charset="UTF-8"
  enctype="multipart/form-data" >

          <center>
           <h3><strong>
   Applicant Declaration
</strong></h3></center>

          <div class="col-md-11">
         

              <div class="form-group" >

    <input type="radio" name="answer" value="This is my first application" id="no" onclick="myFunction(this.value)" required="" />
<text for="This is my first application">This is my first application</text>  
<br><br>
<input type="radio" name="answer" value="I have been listed in the year" id="yes" onclick="myFunction(this.value)" required="" />
<text for="I have been listed in the year">I have been listed in the year</text>

<input type="text" name="edit1" id="edit1" disabled title="Enter digit only. Min : 4, Max : 4" minlength="4" maxlength="4"/>

<br><br>
<input type="radio" name="answer" value="I have applied in" id="other" onclick="myFunction(this.value)" required="" /> 
<text for="I have applied in">I have applied in</text>

<input type="text" name="edit2" id="edit2" disabled title="Enter digit only. Min : 4, Max : 4" minlength="4" maxlength="4"/>
<input type="hidden" id="d" value="but was unsuccessful">

<text name="abc" id="abc">(year) but was unsuccessful</text></div>

<div class="form-group" >
  <input type="hidden" style="width: 50%" id="result">
 

  <input style="width: 50%; resize: none;" id='box2' name="confession" type="hidden">

    
     
    <input id="txt" class="field" name="agree" type="checkbox" value="1" > <text style="color:#0073e6">I hereby apply for registration and agree to observe and abide by the Code of Practice specified
         in the final part of this form. I certify that the statements contained in this form.</text>
           
              
              
            </div>
            <div class="col-md-5 col-md-offset-1">

            

        
            </div>
            </hr>
            <div class="row" style="display:none; " id="txtA" >
            <div class="col-md-11" style=" margin-top: 10px; margin-bottom: 10px;" align="right">
              <a class="btn btn-primary" href="/apcsSectionE/create" role="button">Back</a>
              <button id="btnSubmit" type="submit" onclick="ConfirmSubmit();" class="btn btn-primary">Submit</button>
            </div>
          </div>
          </div>
 </form>
    </div>
  </div>
  </body>

   <script type="text/javascript">
     $('#applicantForm').bootstrapValidator({
    feedbackIcons : {
      //valid : 'glyphicon glyphicon-ok',
      //invalid : 'glyphicon glyphicon-remove',
      //validating : 'glyphicon glyphicon-refresh'
    },
    fields : {
   
      answer:{
        validators :{
          notEmpty: {  message: 'Please click on the radio button.' }
        }
      },

      second_specialize : {
        
        validators : {
          notEmpty: { message: 'Second Specialize is required'}
        }
      }  
      
    }
  });








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
        // alert("We have received your registration form. We will process your registration within 3 working days and we will inform the status of your registration through your email\n\n Please logout after finish your submission.\n\n Thank you");
        window.location.href = '/apcsSectionE';
    } else {
        return false;
    }
}
</script>


</html>
@endsection
