<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIGN UP</title>
<!--   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/justified-nav.css" rel="stylesheet" type="text/css">
  <link href="css/templatemo_style.css" rel="stylesheet" type="text/css"> -->
   <!-- Website Font (SIGN UP) style -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  {!!Html::style('css/bootstrap.min.css')!!}
  {!!Html::style('css/justified-nav.css')!!}
  {!!Html::style('css/templatemo_style.css')!!}
  {!!Html::style('css/parsley.css')!!}
  {!!Html::style('css/button.css')!!}

  <style>
  .well {
  background: white;
}
    p {
        text-indent: 30px;
    }
    .table th, .table td {
      border-top: none !important;
      border-left: none !important;
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
  
    .alert.info {background-color: #2196F3;}
  </style>

  </head>

  <body>

      <div class="container">


    <!-- HEADER -->
    <div class="container">
    <div>
      <img src="{{URL::asset('/image/banner1.png')}}" alt="profile Pic" height="100" width="2048", class="img-responsive cleaner">
    </div>
    </div>
  <!-- HEADER -->

<div class="container" style="width: 80%">

<div class="col-xs-12" style="height:50px;"></div>

<div class="well well-lg" style="margin-left: 5%; margin-right: 5%">
    <center>
      <h3>SIGN UP FOR NEW PRE-QUALIFICATION REGISTRATION</h3>
    </center>

<!----------------------------- nadiyxshinku89@gmail.com
--------------------------- register.blade.php-->
<div class="well well-lg" style="margin-left: 10%; margin-right: 10%;background-color: #e0e0d1">
<strong>Instructions :</strong><br>
 &nbsp  •  &nbsp Enter your name<br>
 &nbsp  •  &nbsp Enter your I/C or passport number<br>
 &nbsp  •  &nbsp Enter your Email<br>
 &nbsp  &nbsp  &nbsp <i style="color: blue">For example : khairul@gmail.com</i><br>
 &nbsp  •  &nbsp The password must be at least eight characters, one letter and one number<br>
</div>

        


 <div class="well well-lg"  style="margin-left: 10%; margin-right: 10%; border-color: #006600; background-color: #ccffcc">

       <div class="well" style="border-color: transparent; background-color: transparent;">
      <div class="row main">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" onsubmit="return FormValidation();" onchange="return FormValidation();" id="theForm">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input style="text-transform: uppercase;" type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name" value="{{ old('name') }}" maxlength="255" minlength="10"  autofocus oninput="this.value=this.value.replace(/[^A-Za-z ]/g,'');" onchange="validatename(this);"/>
                  
                </div>
                 @if ($errors->has('name'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('name') }}</text>
                      </span>
                  @endif
                <text id="validationname" style="color:red"></text>
              </div>
            </div>


            <div class="form-group{{ $errors->has('nric') ? ' has-error' : '' }}">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                  <input  type="text" class="form-control" name="nric" id="nric"  placeholder="Enter your I/C or passport number" maxlength="12" minlength="12" style="width: 50%" value="{{ old('nric') }}"  autofocus oninput="this.value=this.value.replace(/[^a-zA-Z_0-9-]/g,'');" onchange="validatenric(this);"/>
                  
                </div>
                @if ($errors->has('nric'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('nric') }}</text>
                      </span>
                  @endif
                 <text id="validationnric" style="color:red"></text>
              </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                  <input  type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" maxlength="100" style="width: 60%" value="{{ old('email') }}"   onchange="ValidateEmail(this);"/>
                
                </div>
                 @if ($errors->has('email'))
                      <span class="help-block">
                          <text style="color:red">{{ $errors->first('email') }}</text>
                      </span>
                  @endif
                  <text id="validationemail" style="color:red"></text>
              </div>
                  
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input id="password" type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" style="width: 80%" />
                  
                  &nbsp
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input  id="password_confirmation" type="password" class="form-control" name="password_confirmation" id="password-confirm"  placeholder="Confirm your Password" style="width: 80%"/>
               
                </div>
                 @if ($errors->has('password'))
                     
                          <text style="color:red">{{ $errors->first('password') }}</text>
                      
                  @endif
                 
                  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp


                 @if ($errors->has('password_confirmation'))
                     
                          <text style="color:red">{{ $errors->first('password_confirmation') }}</text>
                      
                  @endif
                  
                   
              </div>

              <div class="cols-sm-10">
                <div class="input-group">
                  
                      <text id="passwordValidation" style="color:red"></text>

                 
                  &nbsp   &nbsp   &nbsp   &nbsp  &nbsp   &nbsp  &nbsp   &nbsp   &nbsp   &nbsp   &nbsp  &nbsp  &nbsp  &nbsp  &nbsp   &nbsp   &nbsp  &nbsp  &nbsp  &nbsp   &nbsp   &nbsp   &nbsp   &nbsp  &nbsp  &nbsp
                 
                     <text id="passwordValidationC" style="color:red"></text>
                     
                  
                </div>
              </div>
            </div>
            <div class="col-xs-12" style="height:50px;"></div>

            <center>
              <div class="form-group ">
              <button type="submit" class="button" onclick="formcheck();return false">Register</button>
            </center>


  <!-- Modal -->
  <div class="modal fade" id="popup" role="dialog">
    <div class="modal-dialog">

            <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="border-color: transparent">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <div class="well" style="background-color: #ccffcc">
            <h4 class="modal-title">You has sign up successfully</h4>
          </div>
          <center>
          <p>Please check your email for verification before you login.
          </br></br>
          Thank You
          </p>
          </br></br>
          <button type="button" class="button" onclick="window.location.href='/homepage/create'">Close</button></center>
        </div>
      </div>
      <!-- Modal content-->
    </div>
  </div>
  <!-- Modal -->


             <!--  <button  type="button" class="btn btn-primary btn-lg btn-block login-button">Register</button> -->
            </div>
          </form>
      </div>

    </div>
    
    </div>

 </div>

</div>





<!-- FOOTER -->
    <div class="container">
              <footer>
      <div class="credit row">
        <center><div class="col-md-6 col-md-offset-3">
          <div id="templatemo_footer">Copyright © 2017 <a href="#">Jabatan Alam Sekitar</a>
          </div>
        </div>
           </center>
      </div>
    </footer></div>
    <!-- templatemo 393 fantasy -->
    {!! Html::script('js/parsley.min.js')!!}
    {!! Html::script('js/jquery.js')!!}
    {!! Html::script('js/bootstrap.min.js')!!}
    {!! Html::script('js/templatemo_script.js')!!}
<!-- templatemo 393 fantasy -->

<!-- FOOTER -->
</div>
</body>
<script>
$("#password").on('input',function(e){
     var password = $("#password").val();
     console.log(password);
    
     var textValidation = "";
     if(password.length < 8){
         var textCount = "Password must at least 8 charachter"
         textValidation = textValidation + textCount;
         document.getElementById('password').style.borderColor = "red";
     }
     else{
      document.getElementById('password').style.borderColor = "green";
     }
     
     var matches = password.match(/\d+/g);
     if (matches === null) {
         var textNumber = "<br>Password must at least 1 number"
         textValidation = textValidation + textNumber;
         document.getElementById('password').style.borderColor = "red";
     }
     
     var matchesL = password.match(/[a-zA-Z]/);
     if (matchesL === null) {
         var textLetter = "<br>Password must at least 1 letter"
         textValidation = textValidation + textLetter;
         document.getElementById('password').style.borderColor = "red";
     }
     
     $('#passwordValidation').html(textValidation);
     
      var password = $("#password").val();
      var passwordC = $("#password_confirmation").val();
       if(!jQuery.isEmptyObject(passwordC) && password !== passwordC){
           $('#passwordValidationC').html("<br>confirmation password doesn't match");

      }else{
           $('#passwordValidationC').html("");
      }
     
});

$("#password_confirmation").on('input',function(e){
      var password = $("#password").val();
      var passwordC = $("#password_confirmation").val();
      
      if(!jQuery.isEmptyObject(passwordC) && password !== passwordC){
           $('#passwordValidationC').html("<br>confirmation password doesn't match");
            document.getElementById('password_confirmation').style.borderColor = "red";
      }else{
           $('#passwordValidationC').html("");
             document.getElementById('password_confirmation').style.borderColor = "green";
      }
});
</script>

<script type="text/javascript">
   function validatename(){
//First Name Validation 
     var fn=document.getElementById('name').value;
    if(fn == ""){
       $('#validationname').html("Please enter your name");
        document.getElementById('name').style.borderColor = "red";
        return false;
    }else{
      $('#validationname').html("");
        document.getElementById('name').style.borderColor = "green";
    }
    
  
   
}
</script>


<script type="text/javascript">
   function validatenric(){
//First Name Validation 
     var fn=document.getElementById('nric').value;
    if(fn == ""){
       $('#validationnric').html("Please enter your NRIC/Passport No");
        document.getElementById('nric').style.borderColor = "red";
        return false;
    }else{
      $('#validationnric').html("");
        document.getElementById('nric').style.borderColor = "green";
    }
    
    if(fn.length <=8){
        $('#validationnric').html("Your NRIC/Passport No is too short");
        document.getElementById('nric').style.borderColor = "red";
        return false;
    }else{
       $('#validationnric').html("");
        document.getElementById('nric').style.borderColor = "green";
    }
    
   
}
</script>

<script type="text/javascript">
  function ValidateEmail(inputEmail)  
{  
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
if(inputEmail.value.match(mailformat))  
{ 
 document.getElementById('email').style.borderColor = "green";
 $('#validationemail').html("");
    
}  
else  
{  
$('#validationemail').html("You have entered an invalid email address!");
        document.getElementById('email').style.borderColor = "red";
//alert("You have entered an invalid email address!");  

return false;  
}  
}  
</script>
<script type="text/javascript">
  function formcheck() {
  var fields = $(".input-group")
        .find("select, textarea, input").serializeArray();
  
  $.each(fields, function(i, field) {
    if (!field.value)
      $('#validationemail').html("This field is required!");
    $('#validationnric').html("This field is required!");
     $('#validationname').html("This field is required!");
      $('#passwordValidation').html("This field is required!");
       $('#passwordValidationC').html("This field is required!");
   }); 
  console.log(fields);
}
</script>

</html>
