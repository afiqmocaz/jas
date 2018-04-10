@extends('layouts.master')
@section('content')
@section('header', ': EIA : SECTION F - DECLARATION')
<html>
  <head>
    <title>CRS Online: Registration</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://vta.doe.gov.my/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrapValidator.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	  @include('sidebar2')
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
         

          <form role="form" method="POST" action="{{ route('eiaSectionF.store')}}" name="applicantForm" id="applicantForm"  accept-charset="UTF-8"
  enctype="multipart/form-data" >

          <center>
           <h3><strong>
  Code of Practice
</strong></h3></center>

          <div class="col-md-11">
         

              <div class="form-group" >

                <p>
  All applicants <strong style="color: black"> must sign and agree </strong>to abide by the Code of Practice, which is designed to ensure that registered individuals act in an ethical and professional manner.</p>
<p><strong style="color: black">All registered individuals shall:</strong></p>
</p>   
<p style="margin-left: 3%;font-size:15px;font-family:arial">
        <i class="fa fa-dot-circle-o" ></i>  <strong style="color: black">Act professionally, accurately and in an unbiased manner </strong></p>
        <p style="margin-left: 3%">
         <i class="fa fa-dot-circle-o"> </i>  <strong style="color: black">Strive</strong> to increase the competence and prestige of the environmental impact assessment profession</p>

        <p style="margin-left: 3%">
         <i class="fa fa-dot-circle-o"></i>  <strong style="color: black">Assist those under my supervision </strong>(if relevant) in developing their management, professional and
             environmental impact assessment skills</p>
             <p style="margin-left: 3%">
         <i class="fa fa-dot-circle-o"></i>  <strong style="color: black">Not to undertake any jobs</strong> that I am not competence to perform</p></i>
        <p style="margin-left: 3%">
         <i class="fa fa-dot-circle-o"></i>  <strong style="color: black">Not to represent conflicting or competing interests </strong>and to disclose to any client or employer any
             relationship that may influence my judgement</p>
             <p style="margin-left: 3%">
         <i class="fa fa-dot-circle-o"></i>  <strong style="color: black">Not to accept any inducement, commission, gift or any other benefit </strong>from any interested party or
             knowingly allow colleagues to do so</p>
             <p style="margin-left: 3%">
         <i class="fa fa-dot-circle-o"></i>  <strong style="color: black">Not to intentionally communicate false or misleading information </strong>that may compromise the integrity of
             any EIA study</p>
             <p style="margin-left: 3%" >
         <i class="fa fa-dot-circle-o"></i>  <strong style="color: black">Not to act in any way that would prejudice the reputation of the EIA Consultants Registration Scheme </strong>
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
       
    <input id="txt" class="field" name="agree" type="checkbox" value="1" > <text style="color:#0073e6">I hereby apply for registration and agree to observe and abide by the Code of Practice specified
         in the final part of this form. I certify that the statements contained in this form.</text>
           
              
              
            </div>
            <div class="col-md-5 col-md-offset-1">

            

        
            </div>
            </hr>
            <div class="row" style="display:none; " id="txtA" >
            <div class="col-md-11" style=" margin-top: 10px; margin-bottom: 10px;" align="right">
              <a class="btn btn-primary" href="/eiaSectionE/create" role="button">Back</a>
              <button id="btnSubmit" type="submit" class="btn btn-primary">Submit</button>
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
   
      first_specialize:{
        validators :{
          notEmpty: {  message: 'First Specialize is required' }
        }
      },

      second_specialize : {
        
        validators : {
          notEmpty: { message: 'Second Specialize is required'}
        }
      }  
      
    }
  });

 $('#txt').click(function() {
    $("#txtA").toggle(this.checked);
});

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

</html>
@endsection
