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
    <script type="text/javascript">
      function loaddata() {
        
        // $('#emailx').val(emel);
        //  $("#BtnSubmitX").click();  
        // if (emel) {
        //   //alert('emel');
        //   $.ajax({
        //     type: 'post',
        //     url: 'ldapuser2',
        //     data: {
        //      email:emel,
        //     },
        //     success: function (response) {
        //      // We get the element having id of display_info and put the response inside it
        //      $( '#name' ).html(response);
        //     }
        //   });
        // }
          $.ajax({
        type: "POST",
        dataType: "json",
        url: '/ldapuser2',
        data: {
            email : $("#email").val(),
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {


            var data = response;
$('#name').val(data.cn);
  $('#position').val(data.title);
  $('#statebrnch').val(data.physicaldeliveryofficename);          
console.log(data.cn);
        }
    });
      }
    </script>

    <body >
  <div class="row">
      <div class="col-md-4 margin-tb">
          TEST
          <div><strong>Tarikh:</strong> <?=date('d-m-Y')?></div>
          <div><strong>Nama:</strong> {{ $cn[0] }}</div>
          <div><strong>Jawatan:</strong> {{ $title[0] }}</div>
          <div><strong>Negeri/Cawangan:</strong> {{ $branch[0] }}</div>
          <div><strong>Kata Laluan LDAP:</strong> {{ $branch[0] }}</div>

      </div>
         {!! Form::open(['action' => ['UserAdminController@ldapF'], 'method' => 'GET']) !!}   
                
                  <input id="emailx" name="emailx" type="text" maxlength="100" autocomplete="off" class="form-control hide" placeholder="Enter your email address" value="" style="font-size: 15px;display: inline;width:88%">&nbsp; <button type="submit" id="BtnSubmitX" class="btn btn-primary hide" id="bn">Search</button>
                    {!! Form::close() !!}
      <form id="applicantForm" action="{{ route('users.store')}}" method="POST" enctype="multipart/form-data">
        <div class="col-md-8 margin-tb">
            <div class="panel panel-default">

          <div class="panel-heading" style="background-color:#222d32;color:white;height:10%;padding-top: 3%;font-family: arial"><center><h4>CREATE NEW USER (LDAP)</h4></center></div>
        
                

                <div class="panel-body">
                  
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}
                        
              <div class="form-group" style="margin-left: 3%"> 
               {!! Form::open(['action' => ['UserAdminController@ldapF'], 'method' => 'GET']) !!}   
                <label class="">Email Address</label>
                  <input id="email" name="email" type="text" maxlength="100" autocomplete="off" class="form-control" placeholder="Enter your email address" value="" style="font-size: 15px;display: inline;width:88%">&nbsp; <button type="button" id="BtnSubmit" class="btn btn-primary" onclick="loaddata()" id="bn">Search</button>
                    {!! Form::close() !!}
                  <text id="validationemail" style="color:red;font-size: 12px"></text>
              </div>

              <div class="form-group" style="margin-left: 3%">    
                <label class="">Name</label>
                  <input name="name" id="name" type="text" maxlength="100" class="form-control input-sm" placeholder="Enter your full name" value="" style="width:97%;font-size: 15px" readonly>  
                              
              </div>

              <div class="form-group" style="margin-left: 3%">    
                <label class="">Position</label>
                  <input name="position" id="position" type="text" maxlength="100" class="form-control input-sm" placeholder="Enter your position" value=" " style="width:97%;font-size: 15px" readonly>  
                              
              </div>

              <div class="form-group" style="margin-left: 3%">    
                <label class="">State/Branch</label>
                  <input name="statebrnch" id="statebrnch" type="text" maxlength="100" class="form-control input-sm" placeholder="Enter your state/branch" value="" style="width:97%;font-size: 15px" readonly>  
                              
              </div>

              <div class="form-group" style="margin-left: 3%">    
                <label class="">NRIC/Passport No.</label>
                  <input name="nric"  id="nric" type="text" maxlength="12" class="form-control input-sm" placeholder="Enter your NRIC/Passport No" value="" style="width:50%;font-size: 15px" onblur="duplicateNric(this)"> 
                   <text id="validationnric" style="color:red;font-size: 12px"></text>
                              
              </div>
              <div class="row" style="padding-left: 18px;font-family: arial;font-size: 12px">
                <div class="col-sm-4">
                  <span id="12char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Atleast 8 Characters<br>
                </div></div><br>
             
              
              <div class="form-group" style="margin-left: 3%">    
                <label class="">Password</label>
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
                <label class="">Retype Password</label>
                  <input name="password_confirmation" id="password_confirmation" type="password" maxlength="30" autocomplete="off" class="form-control input-sm" placeholder="Confirm Password" style="width: 50%;font-size: 15px">             
                  
              </div>
               <div class="form-group">
                <label>Role:</label>
                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control input-sm','multiple')) !!}
            </div>
              

                        <div class="form-group">
                            <div class="col-md-11" style=" margin-top: 10px; margin-bottom: 10px; margin-left: 10%" align="right">
              <a href="/users" class="btn btn-primary" role="button">Back to User List</a>
              <button id="btnSubmit" type="submit" class="btn btn-primary ">Register</button>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div></form>
  </div>
  <br>
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif
 
@endsection