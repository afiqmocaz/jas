@extends('layouts.master')
 
@section('content')

<html>
  <head>
    <title>CRS Online: Pre-Registration</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://vta.doe.gov.my/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrapValidator.css" rel="stylesheet" type="text/css">
        @include('adminsidebar') 
    </head>
    <style>
      
        body {font-family: arial;
       background-image: url("gambar.jpg") }
        form{font-size: 15px;
           
        }
        
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
    .inner .button{border-radius:10px 10px 10px 10px;color: #FFFFFF; background: rgba(50,50,50, 0.4); padding: 2px 30px ;  border: 2px solid #9f00a7;  font-family: arial; margin:10px auto; font-weight: bold;}
    .inner .button:hover{background: #8f00a7; color: white;}

    </style>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/jquery.sheepItPlugin.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/bootstrapValidator.min.js"></script>
    <!--<script type="text/javascript" src="https://vta.doe.gov.my/js/jquery.maskedinput.js"></script> -->

    <body >
 
  <div class="section" style="padding: 0px;">
  <!--<div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>-->
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row" style="margin-top: -25px;" >

                    @if ($message = Session::get('status'))
<div class="alert alert-success alert-block" style="width: 50%;" >
  <a type="button" class="close" data-dismiss="alert" href="/">&times;</a> 
        <text style="color:black">{{ $message }}</text>
</div>
@endif 
<br>
     
      {!! Form::model($user, ['route' =>['users.update', $user->id], 'method' => 'PATCH', 'files'=>'true','id'=>'applicantForm']) !!}
        <div class="col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#222d32;color:white;height:10%;padding-top: 3%;font-family: arial"><center><h4>EDIT USER</h4></center></div>

                <div class="panel-body">
                  
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        
                          <div class="form-group" style="margin-left: 3%">    
                <text class="">Name</text>
                  {!! Form::text('name', null, array('placeholder' => 'Enter Name','class' => 'form-control input-sm','style' => 'width: 50%')) !!}  
                              
              </div>
              <div class="form-group" style="margin-left: 3%">    
                <text class="">NRIC/Passport No.</text>
                  {!! Form::text('nric', null, array('id'=>'nric','placeholder' => 'Enter NRIC/Passport','class' => 'form-control input-sm','style' => 'width: 50%','maxlength'=>'12')) !!}
                   <text id="validationnric" style="color:red;font-size: 12px"></text>
                              
              </div>
              <div class="row" style="padding-left: 18px;font-family: arial;font-size: 12px">
                <div class="col-sm-4">
                  <span id="12char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Atleast 8 Characters<br>
                </div></div><br>
             
              <div class="form-group" style="margin-left: 3%">    
                <text class="">Email Address</text>
                  {!! Form::text('email', null, array('placeholder' => 'Enter Email Address','class' => 'form-control input-sm','style' => 'width: 50%','maxlength'=>'100')) !!}         
                  
                  <text id="validationemail" style="color:red;font-size: 12px"></text>
              </div>

              <div class="form-group" style="margin-left: 3%">
                <text>Status:</text>
              

                {{ Form::select('verified', ['0' => 'inactive', '1' => 'active'], $user->verified, array('class' => 'form-control input-sm', 'style' => 'width: 50%', 'required' => ''))}}
    
  
            </div>

              <div class="form-group" style="margin-left: 3%">    
                <text class="">Password</text>
                  <input name="password" id="password" type="password" maxlength="30" autocomplete="off" class="form-control input-sm" placeholder="Password" style="width: 50%;font-size: 15px">              
                  
              </div>
              <div class="row" style="padding-left: 18px;font-family: arial;font-size: 12px">
                <div class="col-sm-4">
                  <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Atleast 8 Characters<br>
                </div><br>
                <div class="col-sm-4">
                <span id="ulcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Atleast One Letter<br>
              </div><br>
              <div class="col-sm-4">
                <span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Atleast One Number<br>             
              </div>
              </div>
              <br>
              <div class="form-group" style="margin-left: 3%">    
                <text class="">Retype Password</text>
                  <input name="password_confirmation" id="password_confirmation" type="password" maxlength="30" autocomplete="off" class="form-control input-sm" placeholder="Confirm Password" style="width: 50%;font-size: 15px">             
                  
              </div>
               <div class="form-group">
                <text>Role:</text>
                 {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple','style' => 'width: 50%')) !!}
            </div>
              

                        <div class="form-group">
                            <div class="col-md-11" style=" margin-top: 10px; margin-bottom: 10px; margin-left: 10%" align="right">
                              <a href="/users" class="btn btn-primary" role="button">Back to User List</a>
              <button id="btnSubmit" type="submit" class="btn btn-primary ">Update</button>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
          </div>{!!Form::close()!!}</div>
      
  </body>
  <script type="text/javascript">

  $('#applicantForm').bootstrapValidator({
    feedbackIcons : {
      //valid : 'glyphicon glyphicon-ok',
      //invalid : 'glyphicon glyphicon-remove',
      //validating : 'glyphicon glyphicon-refresh'
    },
    fields : {
      name:{
        validators :{
          notEmpty: {  message: 'Name of Applicant is required' },
          stringLength: {
                        message: 'Name of Applicant must be less than 100 characters',
                        max: function (value, validator, $field) {
                            return 100 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      },

      nric:{
        validators :{
          notEmpty: {  message: 'NRIC/Passport No is required' },
          stringLength: {
                        message: 'NRIC/Passport No is required must be less than 12 characters',
                        max: function (value, validator, $field) {
                            return 12 - (value.match(/\r/g) || []).length;
                        }
                       },
                       

        }
      },
    
      email:{
        validators :{
          notEmpty: {  message: 'Email Address is required' },
          emailAddress: { message: 'Please enter a valid email address' },
          stringLength: {
                      message: 'Email Address must be less than 100 characters',
                      max: function (value, validator, $field) {
                          return 100 - (value.match(/\r/g) || []).length;
                      }
                },
               
        }

      },
      password:{
        validators :{
       
          stringLength: {
                       min: 8,
                       max: 30,
                       message: ' '
                     },
                               
        }
      },
      password_confirmation:{
        validators :{
         
          stringLength: {
                      message: 'Confirm Password must be less than 30 characters',
                      max: function (value, validator, $field) {
                          return 30 - (value.match(/\r/g) || []).length;
                      }
                 },
                  identical: {
                      field: 'password',
                      message: 'The password and its confirm are not the same'
                  }
        }
      },
      
    }
  });


function duplicateEmail(element){
        var email = $(element).val();
        $.ajax({
            type: "POST",
            url: '{{url('checkemail')}}',
            data: {email:email},
            dataType: "json",
            success: function(res) {
                if(res.exists){
                  $('#validationemail').html("Email Address Already exist");
                  $("#email").val('');
                  $('#applicantForm').bootstrapValidator('enableFieldValidators', 'email', true);
                }else{
                    $('#validationemail').html("");
                }
            },
            error: function (jqXHR, exception) {

            }
        });
    }
  
  function duplicateNric(element){
        var nric = $(element).val();
        $.ajax({
            type: "POST",
            url: '{{url('checknric')}}',
            data: {nric:nric},
            dataType: "json",
            success: function(res) {
                if(res.exists){
                  $('#validationnric').html("NRIC/Passport No. Already exist");
                  $("#nric").val('');
                  $('#applicantForm').bootstrapValidator('enableFieldValidators', 'nric', true);
                }else{
                     $('#validationnric').html("");
                   
                }
            },
            error: function (jqXHR, exception) {

            }
        });
    }
 
  $("input[type=password]").keyup(function(){
      var ucase = new RegExp("[A-Z]+");
    var lcase = new RegExp("[a-z]+");
    var num = new RegExp("[0-9]+");
    
    if($("#password").val().length >= 8){
      $("#8char").removeClass("glyphicon-remove");
      $("#8char").addClass("glyphicon-ok");
      $("#8char").css("color","#00A41E");
    }else{
      $("#8char").removeClass("glyphicon-ok");
      $("#8char").addClass("glyphicon-remove");
      $("#8char").css("color","#FF0004");
    }
    
    if(ucase.test($("#password").val()) || lcase.test($("#password").val()) ){
      $("#ulcase").removeClass("glyphicon-remove");
      $("#ulcase").addClass("glyphicon-ok");
      $("#ulcase").css("color","#00A41E");

    }else{
      $("#ulcase").removeClass("glyphicon-ok");
      $("#ulcase").addClass("glyphicon-remove");
      $("#ulcase").css("color","#FF0004");

    }

    if(num.test($("#password").val())){
      $("#num").removeClass("glyphicon-remove");
      $("#num").addClass("glyphicon-ok");
      $("#num").css("color","#00A41E");
    }else{
      $("#num").removeClass("glyphicon-ok");
      $("#num").addClass("glyphicon-remove");
      $("#num").css("color","#FF0004");
    }   
  });


 $("input[name=nric]").keyup(function(){
    
    if($("#nric").val().length >= 8){
      $("#12char").removeClass("glyphicon-remove");
      $("#12char").addClass("glyphicon-ok");
      $("#12char").css("color","#00A41E");
    }else{
      $("#12char").removeClass("glyphicon-ok");
      $("#12char").addClass("glyphicon-remove");
      $("#12char").css("color","#FF0004");
    }
  
   
  });
</script>
</html>


@endsection