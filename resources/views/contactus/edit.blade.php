@extends('layouts.master')
@section('header', 'List Of Contact : DOE Contact')  
@section('content')
<html>
  <head>
    <title>CRS Online: Contact Us</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://vta.doe.gov.my/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="https://vta.doe.gov.my/css/bootstrapValidator.css" rel="stylesheet" type="text/css">
      @include('adminsidebar')
    </head>
    <style>
      
        body {font-family: arial; }
        form{font-size: 15px;}
        
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
    .formmodel{
        width: 60%;
        /*margin:auto;*/
    }

    </style>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/jquery.sheepItPlugin.js"></script>
    <script type="text/javascript" src="https://vta.doe.gov.my/js/bootstrapValidator.min.js"></script>
    <!--<script type="text/javascript" src="https://vta.doe.gov.my/js/jquery.maskedinput.js"></script> -->

    <body>
  
  <div class="section" style="padding: 0px;">
    <div class="container">
     {!! Form::model($contactus, ['route' =>['contactus.update', $contactus->id], 'method' => 'PUT', 'files' => true,'class'=>'formmodel']) !!}
                      
        <div  style="border: 1px solid #C8C8C8; margin-top: 10px; background-color: #FFFFFF; opacity: 0.9; filter: alpha(opacity=60);">
          <h3 class="text-center">Contact Us</h3>
          <hr/>
          
            <div class="form-group" style="margin-left: 3%">    
                <label class="">Department name</label>
                  <input name="department" id="department" type="text" maxlength="100" class="form-control input-sm" placeholder="Enter your department name" value="{{$contactus->department}}" style="width:97%">  
                              
              </div>

              <div class="form-group" style="margin-left: 3%">    
                <label class="">Address</label>
                  <input name="address" id="address" type="textarea" maxlength="255" class="form-control input-sm" placeholder="Enter your address" value="{{$contactus->address}}" style="width:97%">  
                              
              </div>

              <div class="form-group" style="margin-left: 3%">    
                <label class="">Telephone No</label>
                  <input name="telno" id="telno" type="text" maxlength="100" class="form-control input-sm" placeholder="Enter your telephone no" value="{{$contactus->telno}}" style="width:97%">  
                              
              </div>
             
              <div class="form-group" style="margin-left: 3%">    
                <label class="">Fax No</label>
                  <input name="faxno" id="faxno" type="text" maxlength="100" class="form-control input-sm" placeholder="Enter your telephone no" value="{{$contactus->faxno}}" style="width:97%">  
                              
              </div>
             
             </div> 
           
            </hr>

            <div class="row">
            <div class="col-md-12" style=" margin-top: 10px; margin-bottom: 10px;" align="right">
              <a href="/contactus/show" class="btn btn-primary" role="button">Back To Lists of Contact</a>
              <button id="btnSubmit" type="submit" class="btn btn-primary ">Update</button>
            </div>
          </div>
          </div>
     {!! Form::close() !!}
    </div>
  </div>
  </body>
</html>

<script type="text/javascript">
  $('#applicantForm').bootstrapValidator({
    feedbackIcons : {
      //valid : 'glyphicon glyphicon-ok',
      //invalid : 'glyphicon glyphicon-remove',
      //validating : 'glyphicon glyphicon-refresh'
    },
    fields : {
      department:{
        validators :{
          notEmpty: {  message: 'Department is required' },
          stringLength: {
                        message: 'Department must be less than 100 characters',
                        max: function (value, validator, $field) {
                            return 100 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      },
      
      address:{
        validators :{
          notEmpty: {  message: 'Address  is required' },
          stringLength: {
                        message: 'Address must be less than 100 characters',
                        max: function (value, validator, $field) {
                            return 255 - (value.match(/\r/g) || []).length;
                        }
                    }
        }
      },

       telno:{
        validators :{
                    notEmpty: {  message: 'H/P Number is required' },
                    stringLength: {
                        message: 'H/P Number must be less than 12 characters',
                        max: function (value, validator, $field) {
                            return 100 - (value.match(/\r/g) || []).length;
                        }
                     }
                }

      },
      

     

      
    }
  });

 

</script>
@endsection